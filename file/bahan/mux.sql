/*
Navicat MySQL Data Transfer

Source Server         : mux2
Source Server Version : 50141
Source Host           : 127.0.0.1:3306
Source Database       : mux

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2014-02-05 10:38:09
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
INSERT INTO `tb_alat` VALUES ('dgfyt676575', 'rdtdtqhtdtyq', 'tretrq', 'rewrywyr', '2002', 'rusak');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_backbone
-- ----------------------------
INSERT INTO `tb_backbone` VALUES ('1', 'ZTE SB-JKT', '1', '2016', '0', '0', '0', '0', 'ZTE SB-JKT');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_ggn
-- ----------------------------
INSERT INTO `tb_ggn` VALUES ('1', '2', 'khjkhjk', '2', '2', '2014-02-06', '11:11:00', '11:19:00', '2', '4');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_koordinasi
-- ----------------------------
INSERT INTO `tb_koordinasi` VALUES ('4', '1', '22', '1111', '2');
INSERT INTO `tb_koordinasi` VALUES ('6', '5', '08042829', '0312492384', '5');
INSERT INTO `tb_koordinasi` VALUES ('7', '3', 'okh;k', 'ljhkjh', '9');
INSERT INTO `tb_koordinasi` VALUES ('8', '3', '4654654', '5365465546', '9');
INSERT INTO `tb_koordinasi` VALUES ('9', '3', '0980808', '009898', '13');

-- ----------------------------
-- Table structure for tb_linka
-- ----------------------------
DROP TABLE IF EXISTS `tb_linka`;
CREATE TABLE `tb_linka` (
  `id_linka` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` text NOT NULL,
  `nama` varchar(11) NOT NULL,
  PRIMARY KEY (`id_linka`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

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
INSERT INTO `tb_linka` VALUES ('25', 'SB2G', 'SB2G');
INSERT INTO `tb_linka` VALUES ('26', 'SB2', 'SB2');
INSERT INTO `tb_linka` VALUES ('27', 'MN', 'MN');
INSERT INTO `tb_linka` VALUES ('28', 'MO', 'MO');
INSERT INTO `tb_linka` VALUES ('29', 'BPP', 'BPP');
INSERT INTO `tb_linka` VALUES ('30', 'GBR', 'GBR');
INSERT INTO `tb_linka` VALUES ('31', 'MDN', 'MDN');
INSERT INTO `tb_linka` VALUES ('32', 'GS', 'GS');
INSERT INTO `tb_linka` VALUES ('33', 'PBO', 'PBO');
INSERT INTO `tb_linka` VALUES ('34', 'DMO', 'DMO');
INSERT INTO `tb_linka` VALUES ('35', 'PTK', 'PTK');
INSERT INTO `tb_linka` VALUES ('36', 'KLA', 'KLA');
INSERT INTO `tb_linka` VALUES ('37', 'LKS', 'LKS');
INSERT INTO `tb_linka` VALUES ('38', 'KPS', 'KPS');
INSERT INTO `tb_linka` VALUES ('39', 'DRM', 'DRM');
INSERT INTO `tb_linka` VALUES ('40', 'MENUR', 'MENUR');
INSERT INTO `tb_linka` VALUES ('41', 'SB3', 'SB3');
INSERT INTO `tb_linka` VALUES ('42', 'MNR', 'MNR');
INSERT INTO `tb_linka` VALUES ('43', 'PERAK', 'PERAK');
INSERT INTO `tb_linka` VALUES ('44', 'SM', 'SM');
INSERT INTO `tb_linka` VALUES ('45', 'SPEARE', 'SPEARE');
INSERT INTO `tb_linka` VALUES ('46', 'TRUNK', 'TRUNK');
INSERT INTO `tb_linka` VALUES ('47', '33', '33');

-- ----------------------------
-- Table structure for tb_linkb
-- ----------------------------
DROP TABLE IF EXISTS `tb_linkb`;
CREATE TABLE `tb_linkb` (
  `id_linkb` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` text,
  `nama` varchar(20) NOT NULL,
  PRIMARY KEY (`id_linkb`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

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
INSERT INTO `tb_linkb` VALUES ('15', 'JR', 'JR');
INSERT INTO `tb_linkb` VALUES ('16', 'MDN', 'MDN');
INSERT INTO `tb_linkb` VALUES ('17', 'MDN1G', 'MDN1G');
INSERT INTO `tb_linkb` VALUES ('18', 'PD', 'PD');
INSERT INTO `tb_linkb` VALUES ('19', 'JKT2', 'JKT2');
INSERT INTO `tb_linkb` VALUES ('20', 'MO', 'MO');
INSERT INTO `tb_linkb` VALUES ('21', 'SMI', 'SMI');
INSERT INTO `tb_linkb` VALUES ('22', 'BJM', 'BJM');
INSERT INTO `tb_linkb` VALUES ('23', 'BTM', 'BTM');
INSERT INTO `tb_linkb` VALUES ('24', 'JKT4', 'JKT4');
INSERT INTO `tb_linkb` VALUES ('25', 'PBR', 'PBR');
INSERT INTO `tb_linkb` VALUES ('26', 'DPR', 'DPR');
INSERT INTO `tb_linkb` VALUES ('27', 'SNG', 'SNG');
INSERT INTO `tb_linkb` VALUES ('28', 'ITALY', 'ITALY');
INSERT INTO `tb_linkb` VALUES ('29', 'JEDDAH', 'JEDDAH');
INSERT INTO `tb_linkb` VALUES ('30', 'PG', 'PG');
INSERT INTO `tb_linkb` VALUES ('31', 'USA', 'USA');
INSERT INTO `tb_linkb` VALUES ('32', 'MAL4 ', 'MAL4 ');
INSERT INTO `tb_linkb` VALUES ('33', 'JKT4T', 'JKT4T');
INSERT INTO `tb_linkb` VALUES ('34', 'MCI USA', 'MCI USA');
INSERT INTO `tb_linkb` VALUES ('35', ' HK', ' HK');
INSERT INTO `tb_linkb` VALUES ('36', 'MAL', 'MAL');
INSERT INTO `tb_linkb` VALUES ('37', 'JKT2T', 'JKT2T');
INSERT INTO `tb_linkb` VALUES ('38', 'PG1G', 'PG1G');
INSERT INTO `tb_linkb` VALUES ('39', 'JPN', 'JPN');
INSERT INTO `tb_linkb` VALUES ('40', 'PTK', 'PTK');
INSERT INTO `tb_linkb` VALUES ('41', 'JATI NEGARA', 'JATI NEGARA');
INSERT INTO `tb_linkb` VALUES ('42', 'JKT3 (GBR)', 'JKT3 (GBR)');
INSERT INTO `tb_linkb` VALUES ('43', 'JPG', 'JPG');
INSERT INTO `tb_linkb` VALUES ('44', 'CAN', 'CAN');
INSERT INTO `tb_linkb` VALUES ('45', 'KOR', 'KOR');
INSERT INTO `tb_linkb` VALUES ('46', 'SM', 'SM');
INSERT INTO `tb_linkb` VALUES ('47', 'YGA', 'YGA');
INSERT INTO `tb_linkb` VALUES ('48', 'SPEARE', 'SPEARE');
INSERT INTO `tb_linkb` VALUES ('49', 'SLO', 'SLO');
INSERT INTO `tb_linkb` VALUES ('50', 'STP', 'STP');
INSERT INTO `tb_linkb` VALUES ('51', '6', '6');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_peg
-- ----------------------------
INSERT INTO `tb_peg` VALUES ('1', '111111111111', 'mokhamad taufik', 'jalan moker ajaa', 'opik', '202cb962ac59075b964b07152d234b70', 'admin', 'a59c60579cnmed09ig7kqd1205');
INSERT INTO `tb_peg` VALUES ('2', '612030', 'mulyono', 'pegesangan gg.10', 'epiii', 'd41d8cd98f00b204e9800998ecf8427e', 'user', 'rltohpvhaj6ukjsb9na3733sf1');
INSERT INTO `tb_peg` VALUES ('5', '999999999999', 'public2 2', 'lupa', 'opik', '1996b97f5732a056542036235a55ea2f', 'public', 'a59c60579cnmed09ig7kqd1205');
INSERT INTO `tb_peg` VALUES ('9', '612030', 'mulyono', 'pagesangan', '612030', 'a07c7767a98b8e26418ceb19316475d3', 'user', '');
INSERT INTO `tb_peg` VALUES ('10', '621350', 'sugiyono', 'sidoarjo gg,10', '621350', '025db44c7bed5aad0be250dd67f1321b', 'user', '');
INSERT INTO `tb_peg` VALUES ('13', '613020', 'soimah', 'ds.wates boyo', '123', '202cb962ac59075b964b07152d234b70', 'user', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=926 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_perangkat_detail
-- ----------------------------
INSERT INTO `tb_perangkat_detail` VALUES ('1', 'P001', 'D04_11_01', '438DDFT_', 'R4_SR2_SL2_1', 'R3_SR3_SL15_1', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('2', 'P001', 'D04_11_02', '', 'R4_SR2_SL2_2', 'R3_SR3_SL15_2', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('3', 'P001', 'D04_11_03', '', 'R4_SR2_SL2_3', 'R3_SR3_SL15_3', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('4', 'P001', 'D04_11_04', '', 'R4_SR2_SL2_4', 'R3_SR3_SL15_4', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('5', 'P001', 'D04_11_05', '', 'R4_SR2_SL2_5', 'R3_SR3_SL15_5', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('6', 'P001', 'D04_11_06', '', 'R4_SR2_SL2_6', 'R3_SR3_SL15_6', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('7', 'P001', 'D04_11_07', '', 'R4_SR2_SL2_7', 'R3_SR3_SL15_7', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('8', 'P001', 'D04_11_08', '', 'R4_SR2_SL2_8', 'R3_SR3_SL15_8', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('9', 'P001', 'D04_11_09', '', 'R4_SR2_SL2_9', 'R3_SR3_SL15_9', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('10', 'P001', 'D04_11_10', '', 'R4_SR2_SL2_10', 'R3_SR3_SL15_10', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('11', 'P001', 'D04_11_11', '', 'R4_SR2_SL2_11', 'R3_SR3_SL15_11', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('12', 'P001', 'D04_11_12', '', 'R4_SR2_SL2_12', 'R3_SR3_SL15_12', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('13', 'P001', 'D04_11_13', '', 'R4_SR2_SL2_13', 'R3_SR3_SL15_13', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('14', 'P001', 'D04_11_14', '', 'R4_SR2_SL2_14', 'R3_SR3_SL15_14', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('15', 'P001', 'D04_11_15', '', 'R4_SR2_SL2_15', 'R3_SR3_SL15_15', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('16', 'P001', 'D04_11_16', '', 'R4_SR2_SL2_16', 'R3_SR3_SL15_16', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('17', 'P001', 'D04_11_17', '', 'R4_SR2_SL2_17', 'R3_SR3_SL15_17', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('18', 'P001', 'D04_11_18', '', 'R4_SR2_SL2_18', 'R3_SR3_SL15_18', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('19', 'P001', 'D04_11_19', '', 'R4_SR2_SL2_19', 'R3_SR3_SL15_19', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('20', 'P001', 'D04_11_20', '', 'R4_SR2_SL2_20', 'R3_SR3_SL15_20', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('21', 'P001', 'D04_11_21', '', 'R4_SR2_SL2_21', 'R3_SR3_SL15_21', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('22', 'P001', 'D04_12_01', '438DDFT_', 'R4_SR2_SL3_1', 'R3_SR3_SL14_1', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('23', 'P001', 'D04_12_02', '', 'R4_SR2_SL3_2', 'R3_SR3_SL14_2', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('24', 'P001', 'D04_12_03', '', 'R4_SR2_SL3_3', 'R3_SR3_SL14_3', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('25', 'P001', 'D04_12_04', '', 'R4_SR2_SL3_4', 'R3_SR3_SL14_4', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('26', 'P001', 'D04_12_05', '', 'R4_SR2_SL3_5', 'R3_SR3_SL14_5', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('27', 'P001', 'D04_12_06', '', 'R4_SR2_SL3_6', 'R3_SR3_SL14_6', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('28', 'P001', 'D04_12_07', '', 'R4_SR2_SL3_7', 'R3_SR3_SL14_7', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('29', 'P001', 'D04_12_08', '', 'R4_SR2_SL3_8', 'R3_SR3_SL14_8', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('30', 'P001', 'D04_12_09', '', 'R4_SR2_SL3_9', 'R3_SR3_SL14_9', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('31', 'P001', 'D04_12_10', '', 'R4_SR2_SL3_10', 'R3_SR3_SL14_10', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('32', 'P001', 'D04_12_11', '', 'R4_SR2_SL3_11', 'R3_SR3_SL14_11', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('33', 'P001', 'D04_12_12', '', 'R4_SR2_SL3_12', 'R3_SR3_SL14_12', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('34', 'P001', 'D04_12_13', '', 'R4_SR2_SL3_13', 'R3_SR3_SL14_13', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('35', 'P001', 'D04_12_14', '', 'R4_SR2_SL3_14', 'R3_SR3_SL14_14', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('36', 'P001', 'D04_12_15', '', 'R4_SR2_SL3_15', 'R3_SR3_SL14_15', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('37', 'P001', 'D04_12_16', '', 'R4_SR2_SL3_16', 'R3_SR3_SL14_16', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('38', 'P001', 'D04_12_17', '', 'R4_SR2_SL3_17', 'R3_SR3_SL14_17', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('39', 'P001', 'D04_12_18', '', 'R4_SR2_SL3_18', 'R3_SR3_SL14_18', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('40', 'P001', 'D04_12_19', '', 'R4_SR2_SL3_19', 'R3_SR3_SL14_19', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('41', 'P001', 'D04_12_20', '', 'R4_SR2_SL3_20', 'R3_SR3_SL14_20', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('42', 'P001', 'D04_12_21', '', 'R4_SR2_SL3_21', 'R3_SR3_SL14_21', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('43', 'P001', 'D05_01_01', 'F03_02_01', 'R4_SR2_SL4_01', 'R2_SR2_SL4_1', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('44', 'P001', 'D05_01_02', 'F03_02_02', 'R4_SR2_SL4_02', 'R2_SR2_SL4_2', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('45', 'P001', 'D05_01_03', 'F03_02_03', 'R4_SR2_SL4_03', 'R2_SR2_SL4_3', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('46', 'P001', 'D05_01_04', 'F03_02_04', 'R4_SR2_SL4_04', 'R2_SR2_SL4_4', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('47', 'P001', 'D05_01_05', 'F03_02_05', 'R4_SR2_SL4_05', 'R2_SR2_SL4_5', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('48', 'P001', 'D05_01_06', 'F03_02_06', 'R4_SR2_SL4_06', 'R2_SR2_SL4_6', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('49', 'P001', 'D05_01_07', 'F03_02_07', 'R4_SR2_SL4_07', 'R2_SR2_SL4_7', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('50', 'P001', 'D05_01_08', 'F03_02_08', 'R4_SR2_SL4_08', 'R2_SR2_SL4_8', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('51', 'P001', 'D05_01_09', 'F03_02_09', 'R4_SR2_SL4_09', 'R2_SR2_SL4_9', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('52', 'P001', 'D05_01_10', 'F03_02_10', 'R4_SR2_SL4_10', 'R2_SR2_SL4_10', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('53', 'P001', 'D05_01_11', 'F03_02_11', 'R4_SR2_SL4_11', 'R2_SR2_SL4_11', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('54', 'P001', 'D05_01_12', 'F03_02_12', 'R4_SR2_SL4_12', 'R2_SR2_SL4_12', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('55', 'P001', 'D05_01_13', 'F03_02_13', 'R4_SR2_SL4_13', 'R2_SR2_SL4_13', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('56', 'P001', 'D05_01_14', 'F03_02_14', 'R4_SR2_SL4_14', 'R2_SR2_SL4_14', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('57', 'P001', 'D05_01_15', 'F03_02_15', 'R4_SR2_SL4_15', 'R2_SR2_SL4_15', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('58', 'P001', 'D05_01_16', 'F03_02_16', 'R4_SR2_SL4_16', 'R2_SR2_SL4_16', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('59', 'P001', 'D05_01_17', 'F03_02_17', 'R4_SR2_SL4_17', 'R2_SR2_SL4_17', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('60', 'P001', 'D05_01_18', 'F03_02_18', 'R4_SR2_SL4_18', 'R2_SR2_SL4_18', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('61', 'P001', 'D05_01_19', 'F03_02_19', 'R4_SR2_SL4_19', 'R2_SR2_SL4_19', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('62', 'P001', 'D05_01_20', 'F03_02_20', 'R4_SR2_SL4_20', 'R2_SR2_SL4_20', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('63', 'P001', 'D05_01_21', 'F03_02_21', 'R4_SR2_SL4_21', 'R2_SR2_SL4_21', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('64', 'P001', 'D05_02_01', 'F03_03_01', 'R4_SR2_SL11_1', 'R2_SR2_SL11_1', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('65', 'P001', 'D05_02_02', 'F03_03_02', 'R4_SR2_SL11_2', 'R2_SR2_SL11_2', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('66', 'P001', 'D05_02_03', 'F03_03_03', 'R4_SR2_SL11_3', 'R2_SR2_SL11_3', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('67', 'P001', 'D05_02_04', 'F03_03_04', 'R4_SR2_SL11_4', 'R2_SR2_SL11_4', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('68', 'P001', 'D05_02_05', 'F03_03_05', 'R4_SR2_SL11_5', 'R2_SR2_SL11_5', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('69', 'P001', 'D05_02_06', 'F03_03_06', 'R4_SR2_SL11_6', 'R2_SR2_SL11_6', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('70', 'P001', 'D05_02_07', 'F03_03_07', 'R4_SR2_SL11_7', 'R2_SR2_SL11_7', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('71', 'P001', 'D05_02_08', 'F03_03_08', 'R4_SR2_SL11_8', 'R2_SR2_SL11_8', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('72', 'P001', 'D05_02_09', 'F03_03_09', 'R4_SR2_SL11_9', 'R2_SR2_SL11_9', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('73', 'P001', 'D05_02_10', 'F03_03_10', 'R4_SR2_SL11_10', 'R2_SR2_SL11_10', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('74', 'P001', 'D05_02_11', 'F03_03_11', 'R4_SR2_SL11_11', 'R2_SR2_SL11_11', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('75', 'P001', 'D05_02_12', 'F03_03_12', 'R4_SR2_SL11_12', 'R2_SR2_SL11_12', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('76', 'P001', 'D05_02_13', 'F03_03_13', 'R4_SR2_SL11_13', 'R2_SR2_SL11_13', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('77', 'P001', 'D05_02_14', 'F03_03_14', 'R4_SR2_SL11_14', 'R2_SR2_SL11_14', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('78', 'P001', 'D05_02_15', 'F03_03_15', 'R4_SR2_SL11_15', 'R2_SR2_SL11_15', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('79', 'P001', 'D05_02_16', 'F03_03_16', 'R4_SR2_SL11_16', 'R2_SR2_SL11_16', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('80', 'P001', 'D05_02_17', 'F03_03_17', 'R4_SR2_SL11_17', 'R2_SR2_SL11_17', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('81', 'P001', 'D05_02_18', 'F03_03_18', 'R4_SR2_SL11_18', 'R2_SR2_SL11_18', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('82', 'P001', 'D05_02_19', 'F03_03_19', 'R4_SR2_SL11_19', 'R2_SR2_SL11_19', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('83', 'P001', 'D05_02_20', 'F03_03_20', 'R4_SR2_SL11_20', 'R2_SR2_SL11_20', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('84', 'P001', 'D05_02_21', 'F03_03_21', 'R4_SR2_SL11_21', 'R2_SR2_SL11_21', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('85', 'P001', 'D05_03_01', 'F03_04_01', 'R4_SR2_SL12_1', 'R2_SR2_SL12_1', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('86', 'P001', 'D05_03_02', 'F03_04_02', 'R4_SR2_SL12_2', 'R2_SR2_SL12_2', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('87', 'P001', 'D05_03_03', 'F03_04_03', 'R4_SR2_SL12_3', 'R2_SR2_SL12_3', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('88', 'P001', 'D05_03_04', 'F03_04_04', 'R4_SR2_SL12_4', 'R2_SR2_SL12_4', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('89', 'P001', 'D05_03_05', 'F03_04_05', 'R4_SR2_SL12_5', 'R2_SR2_SL12_5', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('90', 'P001', 'D05_03_06', 'F03_04_06', 'R4_SR2_SL12_6', 'R2_SR2_SL12_6', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('91', 'P001', 'D05_03_07', 'F03_04_07', 'R4_SR2_SL12_7', 'R2_SR2_SL12_7', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('92', 'P001', 'D05_03_08', 'F03_04_08', 'R4_SR2_SL12_8', 'R2_SR2_SL12_8', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('93', 'P001', 'D05_03_09', 'F03_04_09', 'R4_SR2_SL12_9', 'R2_SR2_SL12_9', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('94', 'P001', 'D05_03_10', 'F03_04_10', 'R4_SR2_SL12_10', 'R2_SR2_SL12_10', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('95', 'P001', 'D05_03_11', 'F03_04_11', 'R4_SR2_SL12_11', 'R2_SR2_SL12_11', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('96', 'P001', 'D05_03_12', 'F03_04_12', 'R4_SR2_SL12_12', 'R2_SR2_SL12_12', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('97', 'P001', 'D05_03_13', 'F03_04_13', 'R4_SR2_SL12_13', 'R2_SR2_SL12_13', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('98', 'P001', 'D05_03_14', 'F03_04_14', 'R4_SR2_SL12_14', 'R2_SR2_SL12_14', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('99', 'P001', 'D05_03_15', 'F03_04_15', 'R4_SR2_SL12_15', 'R2_SR2_SL12_15', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('100', 'P001', 'D05_03_16', 'F03_04_16', 'R4_SR2_SL12_16', 'R2_SR2_SL12_16', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('101', 'P001', 'D05_03_17', 'F03_04_17', 'R4_SR2_SL12_17', 'R2_SR2_SL12_17', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('102', 'P001', 'D05_03_18', 'F03_04_18', 'R4_SR2_SL12_18', 'R2_SR2_SL12_18', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('103', 'P001', 'D05_03_19', 'F03_04_19', 'R4_SR2_SL12_19', 'R2_SR2_SL12_19', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('104', 'P001', 'D05_03_20', 'F03_04_20', 'R4_SR2_SL12_20', 'R2_SR2_SL12_20', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('105', 'P001', 'D05_03_21', 'F03_04_21', 'R4_SR2_SL12_21', 'R2_SR2_SL12_21', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('106', 'P001', 'D05_04_01', 'F03_05_01', 'R4_SR2_SL13_1', 'R2_SR2_SL13_1', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('107', 'P001', 'D05_04_02', 'F03_05_02', 'R4_SR2_SL13_2', 'R2_SR2_SL13_2', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('108', 'P001', 'D05_04_03', 'F03_05_03', 'R4_SR2_SL13_3', 'R2_SR2_SL13_3', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('109', 'P001', 'D05_04_04', 'F03_05_04', 'R4_SR2_SL13_4', 'R2_SR2_SL13_4', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('110', 'P001', 'D05_04_05', 'F03_05_05', 'R4_SR2_SL13_5', 'R2_SR2_SL13_5', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('111', 'P001', 'D05_04_06', 'F03_05_06', 'R4_SR2_SL13_6', 'R2_SR2_SL13_6', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('112', 'P001', 'D05_04_07', 'F03_05_07', 'R4_SR2_SL13_7', 'R2_SR2_SL13_7', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('113', 'P001', 'D05_04_08', 'F03_05_08', 'R4_SR2_SL13_8', 'R2_SR2_SL13_8', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('114', 'P001', 'D05_04_09', 'F03_05_09', 'R4_SR2_SL13_9', 'R2_SR2_SL13_9', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('115', 'P001', 'D05_04_10', 'F03_05_10', 'R4_SR2_SL13_10', 'R2_SR2_SL13_10', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('116', 'P001', 'D05_04_11', 'F03_05_11', 'R4_SR2_SL13_11', 'R2_SR2_SL13_11', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('117', 'P001', 'D05_04_12', 'F03_05_12', 'R4_SR2_SL13_12', 'R2_SR2_SL13_12', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('118', 'P001', 'D05_04_13', 'F03_05_13', 'R4_SR2_SL13_13', 'R2_SR2_SL13_13', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('119', 'P001', 'D05_04_14', 'F03_05_14', 'R4_SR2_SL13_14', 'R2_SR2_SL13_14', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('120', 'P001', 'D05_04_15', 'F03_05_15', 'R4_SR2_SL13_15', 'R2_SR2_SL13_15', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('121', 'P001', 'D05_04_16', 'F03_05_16', 'R4_SR2_SL13_16', 'R2_SR2_SL13_16', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('122', 'P001', 'D05_04_17', 'F03_05_17', 'R4_SR2_SL13_17', 'R2_SR2_SL13_17', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('123', 'P001', 'D05_04_18', 'F03_05_18', 'R4_SR2_SL13_18', 'R2_SR2_SL13_18', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('124', 'P001', 'D05_04_19', 'F03_05_19', 'R4_SR2_SL13_19', 'R2_SR2_SL13_19', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('125', 'P001', 'D05_04_20', 'F03_05_20', 'R4_SR2_SL13_20', 'R2_SR2_SL13_20', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('126', 'P001', 'D05_04_21', 'F03_05_21', 'R4_SR2_SL13_21', 'R2_SR2_SL13_21', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('127', 'P001', 'D05_05_01', '', 'R4_SR2_SL14_1', 'R2_SR2_SL14_1', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('128', 'P001', 'D05_05_02', '', 'R4_SR2_SL14_2', 'R2_SR2_SL14_2', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('129', 'P001', 'D05_05_03', '', 'R4_SR2_SL14_3', 'R2_SR2_SL14_3', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('130', 'P001', 'D05_05_04', '', 'R4_SR2_SL14_4', 'R2_SR2_SL14_4', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('131', 'P001', 'D05_05_05', '', 'R4_SR2_SL14_5', 'R2_SR2_SL14_5', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('132', 'P001', 'D05_05_06', '', 'R4_SR2_SL14_6', 'R2_SR2_SL14_6', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('133', 'P001', 'D05_05_07', '', 'R4_SR2_SL14_7', 'R2_SR2_SL14_7', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('134', 'P001', 'D05_05_08', '', 'R4_SR2_SL14_8', 'R2_SR2_SL14_8', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('135', 'P001', 'D05_05_09', '', 'R4_SR2_SL14_9', 'R2_SR2_SL14_9', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('136', 'P001', 'D05_05_10', '', 'R4_SR2_SL14_10', 'R2_SR2_SL14_10', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('137', 'P001', 'D05_05_11', '', 'R4_SR2_SL14_11', 'R2_SR2_SL14_11', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('138', 'P001', 'D05_05_12', '', 'R4_SR2_SL14_12', 'R2_SR2_SL14_12', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('139', 'P001', 'D05_05_13', '', 'R4_SR2_SL14_13', 'R2_SR2_SL14_13', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('140', 'P001', 'D05_05_14', '', 'R4_SR2_SL14_14', 'R2_SR2_SL14_14', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('141', 'P001', 'D05_05_15', '', 'R4_SR2_SL14_15', 'R2_SR2_SL14_15', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('142', 'P001', 'D05_05_16', '', 'R4_SR2_SL14_16', 'R2_SR2_SL14_16', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('143', 'P001', 'D05_05_17', '', 'R4_SR2_SL14_17', 'R2_SR2_SL14_17', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('144', 'P001', 'D05_05_18', '', 'R4_SR2_SL14_18', 'R2_SR2_SL14_18', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('145', 'P001', 'D05_05_19', '', 'R4_SR2_SL14_19', 'R2_SR2_SL14_19', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('146', 'P001', 'D05_05_20', '', 'R4_SR2_SL14_20', 'R2_SR2_SL14_20', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('147', 'P001', 'D05_05_21', '', 'R4_SR2_SL14_21', 'R2_SR2_SL14_21', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('148', 'P001', 'D05_06_01', '', 'R4_SR2_SL15_1', 'R2_SR2_SL15_1', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('149', 'P001', 'D05_06_02', '', 'R4_SR2_SL15_2', 'R2_SR2_SL15_2', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('150', 'P001', 'D05_06_03', '', 'R4_SR2_SL15_3', 'R2_SR2_SL15_3', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('151', 'P001', 'D05_06_04', '', 'R4_SR2_SL15_4', 'R2_SR2_SL15_4', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('152', 'P001', 'D05_06_05', '', 'R4_SR2_SL15_5', 'R2_SR2_SL15_5', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('153', 'P001', 'D05_06_06', '', 'R4_SR2_SL15_6', 'R2_SR2_SL15_6', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('154', 'P001', 'D05_06_07', '', 'R4_SR2_SL15_7', 'R2_SR2_SL15_7', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('155', 'P001', 'D05_06_08', '', 'R4_SR2_SL15_8', 'R2_SR2_SL15_8', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('156', 'P001', 'D05_06_09', '', 'R4_SR2_SL15_9', 'R2_SR2_SL15_9', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('157', 'P001', 'D05_06_10', '', 'R4_SR2_SL15_10', 'R2_SR2_SL15_10', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('158', 'P001', 'D05_06_11', '', 'R4_SR2_SL15_11', 'R2_SR2_SL15_11', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('159', 'P001', 'D05_06_12', '', 'R4_SR2_SL15_12', 'R2_SR2_SL15_12', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('160', 'P001', 'D05_06_13', '', 'R4_SR2_SL15_13', 'R2_SR2_SL15_13', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('161', 'P001', 'D05_06_14', '', 'R4_SR2_SL15_14', 'R2_SR2_SL15_14', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('162', 'P001', 'D05_06_15', '', 'R4_SR2_SL15_15', 'R2_SR2_SL15_15', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('163', 'P001', 'D05_06_16', '', 'R4_SR2_SL15_16', 'R2_SR2_SL15_16', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('164', 'P001', 'D05_06_17', '', 'R4_SR2_SL15_17', 'R2_SR2_SL15_17', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('165', 'P001', 'D05_06_18', '', 'R4_SR2_SL15_18', 'R2_SR2_SL15_18', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('166', 'P001', 'D05_06_19', '', 'R4_SR2_SL15_19', 'R2_SR2_SL15_19', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('167', 'P001', 'D05_06_20', '', 'R4_SR2_SL15_20', 'R2_SR2_SL15_20', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('168', 'P001', 'D05_06_21', '', 'R4_SR2_SL15_21', 'R2_SR2_SL15_21', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('169', 'P001', 'E05_01_01', 'F03_09_01', 'R5_SR3_SL4_01', 'R2_SR2_SL1_1', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('170', 'P001', 'E05_01_02', 'F03_09_02', 'R5_SR3_SL4_02', 'R2_SR2_SL1_2', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('171', 'P001', 'E05_01_03', 'F03_09_03', 'R5_SR3_SL4_03', 'R2_SR2_SL1_3', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('172', 'P001', 'E05_01_04', 'F03_09_04', 'R5_SR3_SL4_04', 'R2_SR2_SL1_4', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('173', 'P001', 'E05_01_05', 'F03_09_05', 'R5_SR3_SL4_05', 'R2_SR2_SL1_5', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('174', 'P001', 'E05_01_06', 'F03_09_06', 'R5_SR3_SL4_06', 'R2_SR2_SL1_6', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('175', 'P001', 'E05_01_07', 'F03_09_07', 'R5_SR3_SL4_07', 'R2_SR2_SL1_7', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('176', 'P001', 'E05_01_08', 'F03_09_08', 'R5_SR3_SL4_08', 'R2_SR2_SL1_8', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('177', 'P001', 'E05_01_09', 'F03_09_09', 'R5_SR3_SL4_09', 'R2_SR2_SL1_9', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('178', 'P001', 'E05_01_10', 'F03_09_10', 'R5_SR3_SL4_10', 'R2_SR2_SL1_10', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('179', 'P001', 'E05_01_11', 'F03_09_11', 'R5_SR3_SL4_11', 'R2_SR2_SL1_11', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('180', 'P001', 'E05_01_12', 'F03_09_12', 'R5_SR3_SL4_12', 'R2_SR2_SL1_12', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('181', 'P001', 'E05_01_13', 'F03_09_13', 'R5_SR3_SL4_13', 'R2_SR2_SL1_13', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('182', 'P001', 'E05_01_14', 'F03_09_14', 'R5_SR3_SL4_14', 'R2_SR2_SL1_14', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('183', 'P001', 'E05_01_15', 'F03_09_15', 'R5_SR3_SL4_15', 'R2_SR2_SL1_15', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('184', 'P001', 'E05_01_16', 'F03_09_16', 'R5_SR3_SL4_16', 'R2_SR2_SL1_16', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('185', 'P001', 'E05_01_17', 'F03_09_17', 'R5_SR3_SL4_17', 'R2_SR2_SL1_17', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('186', 'P001', 'E05_01_18', 'F03_09_18', 'R5_SR3_SL4_18', 'R2_SR2_SL1_18', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('187', 'P001', 'E05_01_19', 'F03_09_19', 'R5_SR3_SL4_19', 'R2_SR2_SL1_19', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('188', 'P001', 'E05_01_20', 'F03_09_20', 'R5_SR3_SL4_20', 'R2_SR2_SL1_20', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('189', 'P001', 'E05_01_21', 'F03_09_21', 'R5_SR3_SL4_21', 'R2_SR2_SL1_21', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('190', 'P001', 'E05_02_01', 'F03_10_01', 'R5_SR3_SL11_01', 'R2_SR2_SL2_1', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('191', 'P001', 'E05_02_02', 'F03_10_02', 'R5_SR3_SL11_02', 'R2_SR2_SL2_2', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('192', 'P001', 'E05_02_03', 'F03_10_03', 'R5_SR3_SL11_03', 'R2_SR2_SL2_3', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('193', 'P001', 'E05_02_04', 'F03_10_04', 'R5_SR3_SL11_04', 'R2_SR2_SL2_4', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('194', 'P001', 'E05_02_05', 'F03_10_05', 'R5_SR3_SL11_05', 'R2_SR2_SL2_5', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('195', 'P001', 'E05_02_06', 'F03_10_06', 'R5_SR3_SL11_06', 'R2_SR2_SL2_6', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('196', 'P001', 'E05_02_07', 'F03_10_07', 'R5_SR3_SL11_07', 'R2_SR2_SL2_7', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('197', 'P001', 'E05_02_08', 'F03_10_08', 'R5_SR3_SL11_08', 'R2_SR2_SL2_8', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('198', 'P001', 'E05_02_09', 'F03_10_09', 'R5_SR3_SL11_09', 'R2_SR2_SL2_9', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('199', 'P001', 'E05_02_10', 'F03_10_10', 'R5_SR3_SL11_10', 'R2_SR2_SL2_10', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('200', 'P001', 'E05_02_11', 'F03_10_11', 'R5_SR3_SL11_11', 'R2_SR2_SL2_11', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('201', 'P001', 'E05_02_12', 'F03_10_12', 'R5_SR3_SL11_12', 'R2_SR2_SL2_12', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('202', 'P001', 'E05_02_13', 'F03_10_13', 'R5_SR3_SL11_13', 'R2_SR2_SL2_13', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('203', 'P001', 'E05_02_14', 'F03_10_14', 'R5_SR3_SL11_14', 'R2_SR2_SL2_14', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('204', 'P001', 'E05_02_15', 'F03_10_15', 'R5_SR3_SL11_15', 'R2_SR2_SL2_15', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('205', 'P001', 'E05_02_16', 'F03_10_16', 'R5_SR3_SL11_16', 'R2_SR2_SL2_16', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('206', 'P001', 'E05_02_17', 'F03_10_17', 'R5_SR3_SL11_17', 'R2_SR2_SL2_17', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('207', 'P001', 'E05_02_18', 'F03_10_18', 'R5_SR3_SL11_18', 'R2_SR2_SL2_18', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('208', 'P001', 'E05_02_19', 'F03_10_19', 'R5_SR3_SL11_19', 'R2_SR2_SL2_19', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('209', 'P001', 'E05_02_20', 'F03_10_20', 'R5_SR3_SL11_20', 'R2_SR2_SL2_20', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('210', 'P001', 'E05_02_21', 'F03_10_21', 'R5_SR3_SL11_21', 'R2_SR2_SL2_21', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('211', 'P001', 'E05_03_01', 'F03_01_01', 'R5_SR3_SL12_1', 'R2_SR2_SL3_1', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('212', 'P001', 'E05_03_02', 'F03_01_02', 'R5_SR3_SL12_2', 'R2_SR2_SL3_2', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('213', 'P001', 'E05_03_03', 'F03_01_03', 'R5_SR3_SL12_3', 'R2_SR2_SL3_3', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('214', 'P001', 'E05_03_04', 'F03_01_04', 'R5_SR3_SL12_4', 'R2_SR2_SL3_4', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('215', 'P001', 'E05_03_05', 'F03_01_05', 'R5_SR3_SL12_5', 'R2_SR2_SL3_5', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('216', 'P001', 'E05_03_06', 'F03_01_06', 'R5_SR3_SL12_6', 'R2_SR2_SL3_6', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('217', 'P001', 'E05_03_07', 'F03_01_07', 'R5_SR3_SL12_7', 'R2_SR2_SL3_7', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('218', 'P001', 'E05_03_08', 'F03_01_08', 'R5_SR3_SL12_8', 'R2_SR2_SL3_8', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('219', 'P001', 'E05_03_09', 'F03_01_09', 'R5_SR3_SL12_9', 'R2_SR2_SL3_9', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('220', 'P001', 'E05_03_10', 'F03_01_10', 'R5_SR3_SL12_10', 'R2_SR2_SL3_10', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('221', 'P001', 'E05_03_11', 'F03_01_11', 'R5_SR3_SL12_11', 'R2_SR2_SL3_11', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('222', 'P001', 'E05_03_12', 'F03_01_12', 'R5_SR3_SL12_12', 'R2_SR2_SL3_12', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('223', 'P001', 'E05_03_13', 'F03_01_13', 'R5_SR3_SL12_13', 'R2_SR2_SL3_13', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('224', 'P001', 'E05_03_14', 'F03_01_14', 'R5_SR3_SL12_14', 'R2_SR2_SL3_14', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('225', 'P001', 'E05_03_15', 'F03_01_15', 'R5_SR3_SL12_15', 'R2_SR2_SL3_15', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('226', 'P001', 'E05_03_16', 'F03_01_16', 'R5_SR3_SL12_16', 'R2_SR2_SL3_16', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('227', 'P001', 'E05_03_17', 'F03_01_17', 'R5_SR3_SL12_17', 'R2_SR2_SL3_17', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('228', 'P001', 'E05_03_18', 'F03_01_18', 'R5_SR3_SL12_18', 'R2_SR2_SL3_18', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('229', 'P001', 'E05_03_19', 'F03_01_19', 'R5_SR3_SL12_19', 'R2_SR2_SL3_19', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('230', 'P001', 'E05_03_20', 'F03_01_20', 'R5_SR3_SL12_20', 'R2_SR2_SL3_20', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('231', 'P001', 'E05_03_21', 'F03_01_21', 'R5_SR3_SL12_21', 'R2_SR2_SL3_21', '8');
INSERT INTO `tb_perangkat_detail` VALUES ('232', 'P001', 'K03_04_01', 'D33_11_01', 'R3_SR3_SL1_1', 'R5_SR2_SL4_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('233', 'P001', 'K03_04_02', 'D33_11_02', 'R3_SR3_SL1_2', 'R5_SR2_SL4_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('234', 'P001', 'K03_04_03', 'D33_11_03', 'R3_SR3_SL1_3', 'R5_SR2_SL4_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('235', 'P001', 'K03_04_04', 'D33_11_04', 'R3_SR3_SL1_4', 'R5_SR2_SL4_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('236', 'P001', 'K03_04_05', 'D33_11_05', 'R3_SR3_SL1_5', 'R5_SR2_SL4_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('237', 'P001', 'K03_04_06', 'D33_11_06', 'R3_SR3_SL1_6', 'R5_SR2_SL4_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('238', 'P001', 'K03_04_07', 'D33_11_07', 'R3_SR3_SL1_7', 'R5_SR2_SL4_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('239', 'P001', 'K03_04_08', 'D33_11_08', 'R3_SR3_SL1_8', 'R5_SR2_SL4_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('240', 'P001', 'K03_04_09', 'D33_11_09', 'R3_SR3_SL1_9', 'R5_SR2_SL4_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('241', 'P001', 'K03_04_10', 'D33_11_10', 'R3_SR3_SL1_10', 'R5_SR2_SL4_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('242', 'P001', 'K03_04_11', 'D33_11_11', 'R3_SR3_SL1_11', 'R5_SR2_SL4_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('243', 'P001', 'K03_04_12', 'D33_11_12', 'R3_SR3_SL1_12', 'R5_SR2_SL4_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('244', 'P001', 'K03_04_13', 'D33_11_13', 'R3_SR3_SL1_13', 'R5_SR2_SL4_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('245', 'P001', 'K03_04_14', 'D33_11_14', 'R3_SR3_SL1_14', 'R5_SR2_SL4_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('246', 'P001', 'K03_04_15', 'D33_11_15', 'R3_SR3_SL1_15', 'R5_SR2_SL4_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('247', 'P001', 'K03_04_16', 'D33_11_16', 'R3_SR3_SL1_16', 'R5_SR2_SL4_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('248', 'P001', 'K03_04_17', 'D33_11_17', 'R3_SR3_SL1_17', 'R5_SR2_SL4_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('249', 'P001', 'K03_04_18', 'D33_11_18', 'R3_SR3_SL1_18', 'R5_SR2_SL4_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('250', 'P001', 'K03_04_19', 'D33_11_19', 'R3_SR3_SL1_19', 'R5_SR2_SL4_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('251', 'P001', 'K03_04_20', 'D33_11_20', 'R3_SR3_SL1_20', 'R5_SR2_SL4_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('252', 'P001', 'K03_04_21', 'D33_11_21', 'R3_SR3_SL1_21', 'R5_SR2_SL4_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('253', 'P001', 'K03_05_01', 'D32_01_01', 'R3_SR3_SL2_1', 'R5_SR2_SL11_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('254', 'P001', 'K03_05_02', 'D32_01_02', 'R3_SR3_SL2_2', 'R5_SR2_SL11_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('255', 'P001', 'K03_05_03', 'D32_01_03', 'R3_SR3_SL2_3', 'R5_SR2_SL11_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('256', 'P001', 'K03_05_04', 'D32_01_04', 'R3_SR3_SL2_4', 'R5_SR2_SL11_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('257', 'P001', 'K03_05_05', 'D32_01_05', 'R3_SR3_SL2_5', 'R5_SR2_SL11_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('258', 'P001', 'K03_05_06', 'D32_01_06', 'R3_SR3_SL2_6', 'R5_SR2_SL11_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('259', 'P001', 'K03_05_07', 'D32_01_07', 'R3_SR3_SL2_7', 'R5_SR2_SL11_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('260', 'P001', 'K03_05_08', 'D32_01_08', 'R3_SR3_SL2_8', 'R5_SR2_SL11_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('261', 'P001', 'K03_05_09', 'D32_01_09', 'R3_SR3_SL2_9', 'R5_SR2_SL11_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('262', 'P001', 'K03_05_10', 'D32_01_10', 'R3_SR3_SL2_10', 'R5_SR2_SL11_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('263', 'P001', 'K03_05_11', 'D32_01_11', 'R3_SR3_SL2_11', 'R5_SR2_SL11_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('264', 'P001', 'K03_05_12', 'D32_01_12', 'R3_SR3_SL2_12', 'R5_SR2_SL11_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('265', 'P001', 'K03_05_13', 'D32_01_13', 'R3_SR3_SL2_13', 'R5_SR2_SL11_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('266', 'P001', 'K03_05_14', 'D32_01_14', 'R3_SR3_SL2_14', 'R5_SR2_SL11_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('267', 'P001', 'K03_05_15', 'D32_01_15', 'R3_SR3_SL2_15', 'R5_SR2_SL11_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('268', 'P001', 'K03_05_16', 'D32_01_16', 'R3_SR3_SL2_16', 'R5_SR2_SL11_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('269', 'P001', 'K03_05_17', 'D32_01_17', 'R3_SR3_SL2_17', 'R5_SR2_SL11_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('270', 'P001', 'K03_05_18', 'D32_01_18', 'R3_SR3_SL2_18', 'R5_SR2_SL11_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('271', 'P001', 'K03_05_19', 'D32_01_19', 'R3_SR3_SL2_19', 'R5_SR2_SL11_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('272', 'P001', 'K03_05_20', 'D32_01_20', 'R3_SR3_SL2_20', 'R5_SR2_SL11_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('273', 'P001', 'K03_05_21', 'D32_01_21', 'R3_SR3_SL2_21', 'R5_SR2_SL11_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('274', 'P001', 'K03_06_01', 'D32_02_01', 'R3_SR3_SL3_1', 'R5_SR2_SL12_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('275', 'P001', 'K03_06_02', 'D32_02_02', 'R3_SR3_SL3_2', 'R5_SR2_SL12_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('276', 'P001', 'K03_06_03', 'D32_02_03', 'R3_SR3_SL3_3', 'R5_SR2_SL12_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('277', 'P001', 'K03_06_04', 'D32_02_04', 'R3_SR3_SL3_4', 'R5_SR2_SL12_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('278', 'P001', 'K03_06_05', 'D32_02_05', 'R3_SR3_SL3_5', 'R5_SR2_SL12_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('279', 'P001', 'K03_06_06', 'D32_02_06', 'R3_SR3_SL3_6', 'R5_SR2_SL12_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('280', 'P001', 'K03_06_07', 'D32_02_07', 'R3_SR3_SL3_7', 'R5_SR2_SL12_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('281', 'P001', 'K03_06_08', 'D32_02_08', 'R3_SR3_SL3_8', 'R5_SR2_SL12_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('282', 'P001', 'K03_06_09', 'D32_02_09', 'R3_SR3_SL3_9', 'R5_SR2_SL12_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('283', 'P001', 'K03_06_10', 'D32_02_10', 'R3_SR3_SL3_10', 'R5_SR2_SL12_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('284', 'P001', 'K03_06_11', 'D32_02_11', 'R3_SR3_SL3_11', 'R5_SR2_SL12_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('285', 'P001', 'K03_06_12', 'D32_02_12', 'R3_SR3_SL3_12', 'R5_SR2_SL12_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('286', 'P001', 'K03_06_13', 'D32_02_13', 'R3_SR3_SL3_13', 'R5_SR2_SL12_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('287', 'P001', 'K03_06_14', 'D32_02_14', 'R3_SR3_SL3_14', 'R5_SR2_SL12_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('288', 'P001', 'K03_06_15', 'D32_02_15', 'R3_SR3_SL3_15', 'R5_SR2_SL12_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('289', 'P001', 'K03_06_16', 'D32_02_16', 'R3_SR3_SL3_16', 'R5_SR2_SL12_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('290', 'P001', 'K03_06_17', 'D32_02_17', 'R3_SR3_SL3_17', 'R5_SR2_SL12_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('291', 'P001', 'K03_06_18', 'D32_02_18', 'R3_SR3_SL3_18', 'R5_SR2_SL12_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('292', 'P001', 'K03_06_19', 'D32_02_19', 'R3_SR3_SL3_19', 'R5_SR2_SL12_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('293', 'P001', 'K03_06_20', 'D32_02_20', 'R3_SR3_SL3_20', 'R5_SR2_SL12_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('294', 'P001', 'K03_06_21', 'D32_02_21', 'R3_SR3_SL3_21', 'R5_SR2_SL12_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('295', 'P001', 'K03_07_01', 'D35_03_01', 'R3_SR3_SL4_1', 'R4_SR2_SL1_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('296', 'P001', 'K03_07_02', 'D35_03_02', 'R3_SR3_SL4_2', 'R4_SR2_SL1_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('297', 'P001', 'K03_07_03', 'D35_03_03', 'R3_SR3_SL4_3', 'R4_SR2_SL1_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('298', 'P001', 'K03_07_04', 'D35_03_04', 'R3_SR3_SL4_4', 'R4_SR2_SL1_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('299', 'P001', 'K03_07_05', 'D35_03_05', 'R3_SR3_SL4_5', 'R4_SR2_SL1_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('300', 'P001', 'K03_07_06', 'D35_03_06', 'R3_SR3_SL4_6', 'R4_SR2_SL1_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('301', 'P001', 'K03_07_07', 'D35_03_07', 'R3_SR3_SL4_7', 'R4_SR2_SL1_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('302', 'P001', 'K03_07_08', 'D35_03_08', 'R3_SR3_SL4_8', 'R4_SR2_SL1_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('303', 'P001', 'K03_07_09', 'D35_03_09', 'R3_SR3_SL4_9', 'R4_SR2_SL1_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('304', 'P001', 'K03_07_10', 'D35_03_10', 'R3_SR3_SL4_10', 'R4_SR2_SL1_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('305', 'P001', 'K03_07_11', 'D35_03_11', 'R3_SR3_SL4_11', 'R4_SR2_SL1_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('306', 'P001', 'K03_07_12', 'D35_03_12', 'R3_SR3_SL4_12', 'R4_SR2_SL1_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('307', 'P001', 'K03_07_13', 'D35_03_13', 'R3_SR3_SL4_13', 'R4_SR2_SL1_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('308', 'P001', 'K03_07_14', 'D35_03_14', 'R3_SR3_SL4_14', 'R4_SR2_SL1_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('309', 'P001', 'K03_07_15', 'D35_03_15', 'R3_SR3_SL4_15', 'R4_SR2_SL1_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('310', 'P001', 'K03_07_16', 'D35_03_16', 'R3_SR3_SL4_16', 'R4_SR2_SL1_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('311', 'P001', 'K03_07_17', 'D35_03_17', 'R3_SR3_SL4_17', 'R4_SR2_SL1_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('312', 'P001', 'K03_07_18', 'D35_03_18', 'R3_SR3_SL4_18', 'R4_SR2_SL1_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('313', 'P001', 'K03_07_19', 'D35_03_19', 'R3_SR3_SL4_19', 'R4_SR2_SL1_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('314', 'P001', 'K03_07_20', 'D35_03_20', 'R3_SR3_SL4_20', 'R4_SR2_SL1_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('315', 'P001', 'K03_07_21', 'D35_03_21', 'R3_SR3_SL4_21', 'R4_SR2_SL1_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('316', 'P001', 'K03_08_01', 'D35_04_01', 'R3_SR3_SL11_1', 'R4_SR2_SL2_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('317', 'P001', 'K03_08_02', 'D35_04_02', 'R3_SR3_SL11_2', 'R4_SR2_SL2_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('318', 'P001', 'K03_08_03', 'D35_04_03', 'R3_SR3_SL11_3', 'R4_SR2_SL2_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('319', 'P001', 'K03_08_04', 'D35_04_04', 'R3_SR3_SL11_4', 'R4_SR2_SL2_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('320', 'P001', 'K03_08_05', 'D35_04_05', 'R3_SR3_SL11_5', 'R4_SR2_SL2_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('321', 'P001', 'K03_08_06', 'D35_04_06', 'R3_SR3_SL11_6', 'R4_SR2_SL2_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('322', 'P001', 'K03_08_07', 'D35_04_07', 'R3_SR3_SL11_7', 'R4_SR2_SL2_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('323', 'P001', 'K03_08_08', 'D35_04_08', 'R3_SR3_SL11_8', 'R4_SR2_SL2_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('324', 'P001', 'K03_08_09', 'D35_04_09', 'R3_SR3_SL11_9', 'R4_SR2_SL2_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('325', 'P001', 'K03_08_10', 'D35_04_10', 'R3_SR3_SL11_10', 'R4_SR2_SL2_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('326', 'P001', 'K03_08_11', 'D35_04_11', 'R3_SR3_SL11_11', 'R4_SR2_SL2_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('327', 'P001', 'K03_08_12', 'D35_04_12', 'R3_SR3_SL11_12', 'R4_SR2_SL2_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('328', 'P001', 'K03_08_13', 'D35_04_13', 'R3_SR3_SL11_13', 'R4_SR2_SL2_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('329', 'P001', 'K03_08_14', 'D35_04_14', 'R3_SR3_SL11_14', 'R4_SR2_SL2_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('330', 'P001', 'K03_08_15', 'D35_04_15', 'R3_SR3_SL11_15', 'R4_SR2_SL2_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('331', 'P001', 'K03_08_16', 'D35_04_16', 'R3_SR3_SL11_16', 'R4_SR2_SL2_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('332', 'P001', 'K03_08_17', 'D35_04_17', 'R3_SR3_SL11_17', 'R4_SR2_SL2_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('333', 'P001', 'K03_08_18', 'D35_04_18', 'R3_SR3_SL11_18', 'R4_SR2_SL2_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('334', 'P001', 'K03_08_19', 'D35_04_19', 'R3_SR3_SL11_19', 'R4_SR2_SL2_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('335', 'P001', 'K03_08_20', 'D35_04_20', 'R3_SR3_SL11_20', 'R4_SR2_SL2_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('336', 'P001', 'K03_08_21', 'D35_04_21', 'R3_SR3_SL11_21', 'R4_SR2_SL2_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('337', 'P001', 'K03_09_01', 'D35_05_01', 'R3_SR3_SL12_1', 'R4_SR2_SL3_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('338', 'P001', 'K03_09_02', 'D35_05_02', 'R3_SR3_SL12_2', 'R4_SR2_SL3_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('339', 'P001', 'K03_09_03', 'D35_05_03', 'R3_SR3_SL12_3', 'R4_SR2_SL3_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('340', 'P001', 'K03_09_04', 'D35_05_04', 'R3_SR3_SL12_4', 'R4_SR2_SL3_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('341', 'P001', 'K03_09_05', 'D35_05_05', 'R3_SR3_SL12_5', 'R4_SR2_SL3_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('342', 'P001', 'K03_09_06', 'D35_05_06', 'R3_SR3_SL12_6', 'R4_SR2_SL3_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('343', 'P001', 'K03_09_07', 'D35_05_07', 'R3_SR3_SL12_7', 'R4_SR2_SL3_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('344', 'P001', 'K03_09_08', 'D35_05_08', 'R3_SR3_SL12_8', 'R4_SR2_SL3_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('345', 'P001', 'K03_09_09', 'D35_05_09', 'R3_SR3_SL12_9', 'R4_SR2_SL3_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('346', 'P001', 'K03_09_10', 'D35_05_10', 'R3_SR3_SL12_10', 'R4_SR2_SL3_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('347', 'P001', 'K03_09_11', 'D35_05_11', 'R3_SR3_SL12_11', 'R4_SR2_SL3_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('348', 'P001', 'K03_09_12', 'D35_05_12', 'R3_SR3_SL12_12', 'R4_SR2_SL3_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('349', 'P001', 'K03_09_13', 'D35_05_13', 'R3_SR3_SL12_13', 'R4_SR2_SL3_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('350', 'P001', 'K03_09_14', 'D35_05_14', 'R3_SR3_SL12_14', 'R4_SR2_SL3_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('351', 'P001', 'K03_09_15', 'D35_05_15', 'R3_SR3_SL12_15', 'R4_SR2_SL3_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('352', 'P001', 'K03_09_16', 'D35_05_16', 'R3_SR3_SL12_16', 'R4_SR2_SL3_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('353', 'P001', 'K03_09_17', 'D35_05_17', 'R3_SR3_SL12_17', 'R4_SR2_SL3_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('354', 'P001', 'K03_09_18', 'D35_05_18', 'R3_SR3_SL12_18', 'R4_SR2_SL3_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('355', 'P001', 'K03_09_19', 'D35_05_19', 'R3_SR3_SL12_19', 'R4_SR2_SL3_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('356', 'P001', 'K03_09_20', 'D35_05_20', 'R3_SR3_SL12_20', 'R4_SR2_SL3_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('357', 'P001', 'K03_09_21', 'D35_05_21', 'R3_SR3_SL12_21', 'R4_SR2_SL3_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('358', 'P001', 'K03_10_01', 'D35_06_01', 'R3_SR3_SL13_1', 'R4_SR2_SL4_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('359', 'P001', 'K03_10_02', 'D35_06_02', 'R3_SR3_SL13_2', 'R4_SR2_SL4_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('360', 'P001', 'K03_10_03', 'D35_06_03', 'R3_SR3_SL13_3', 'R4_SR2_SL4_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('361', 'P001', 'K03_10_04', 'D35_06_04', 'R3_SR3_SL13_4', 'R4_SR2_SL4_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('362', 'P001', 'K03_10_05', 'D35_06_05', 'R3_SR3_SL13_5', 'R4_SR2_SL4_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('363', 'P001', 'K03_10_06', 'D35_06_06', 'R3_SR3_SL13_6', 'R4_SR2_SL4_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('364', 'P001', 'K03_10_07', 'D35_06_07', 'R3_SR3_SL13_7', 'R4_SR2_SL4_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('365', 'P001', 'K03_10_08', 'D35_06_08', 'R3_SR3_SL13_8', 'R4_SR2_SL4_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('366', 'P001', 'K03_10_09', 'D35_06_09', 'R3_SR3_SL13_9', 'R4_SR2_SL4_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('367', 'P001', 'K03_10_10', 'D35_06_10', 'R3_SR3_SL13_10', 'R4_SR2_SL4_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('368', 'P001', 'K03_10_11', 'D35_06_11', 'R3_SR3_SL13_11', 'R4_SR2_SL4_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('369', 'P001', 'K03_10_12', 'D35_06_12', 'R3_SR3_SL13_12', 'R4_SR2_SL4_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('370', 'P001', 'K03_10_13', 'D35_06_13', 'R3_SR3_SL13_13', 'R4_SR2_SL4_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('371', 'P001', 'K03_10_14', 'D35_06_14', 'R3_SR3_SL13_14', 'R4_SR2_SL4_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('372', 'P001', 'K03_10_15', 'D35_06_15', 'R3_SR3_SL13_15', 'R4_SR2_SL4_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('373', 'P001', 'K03_10_16', 'D35_06_16', 'R3_SR3_SL13_16', 'R4_SR2_SL4_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('374', 'P001', 'K03_10_17', 'D35_06_17', 'R3_SR3_SL13_17', 'R4_SR2_SL4_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('375', 'P001', 'K03_10_18', 'D35_06_18', 'R3_SR3_SL13_18', 'R4_SR2_SL4_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('376', 'P001', 'K03_10_19', 'D35_06_19', 'R3_SR3_SL13_19', 'R4_SR2_SL4_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('377', 'P001', 'K03_10_20', 'D35_06_20', 'R3_SR3_SL13_20', 'R4_SR2_SL4_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('378', 'P001', 'K03_10_21', 'D35_06_21', 'R3_SR3_SL13_21', 'R4_SR2_SL4_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('379', 'P001', 'K03_11_01', 'D35_07_01', 'R3_S3_SL14_1', 'R4_SR2_SL11_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('380', 'P001', 'K03_11_02', 'D35_07_02', 'R3_S3_SL14_2', 'R4_SR2_SL11_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('381', 'P001', 'K03_11_03', 'D35_07_03', 'R3_S3_SL14_3', 'R4_SR2_SL11_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('382', 'P001', 'K03_11_04', 'D35_07_04', 'R3_S3_SL14_4', 'R4_SR2_SL11_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('383', 'P001', 'K03_11_05', 'D35_07_05', 'R3_S3_SL14_5', 'R4_SR2_SL11_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('384', 'P001', 'K03_11_06', 'D35_07_06', 'R3_S3_SL14_6', 'R4_SR2_SL11_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('385', 'P001', 'K03_11_07', 'D35_07_07', 'R3_S3_SL14_7', 'R4_SR2_SL11_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('386', 'P001', 'K03_11_08', 'D35_07_08', 'R3_S3_SL14_8', 'R4_SR2_SL11_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('387', 'P001', 'K03_11_09', 'D35_07_09', 'R3_S3_SL14_9', 'R4_SR2_SL11_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('388', 'P001', 'K03_11_10', 'D35_07_10', 'R3_S3_SL14_10', 'R4_SR2_SL11_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('389', 'P001', 'K03_11_11', 'D35_07_11', 'R3_S3_SL14_11', 'R4_SR2_SL11_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('390', 'P001', 'K03_11_12', 'D35_07_12', 'R3_S3_SL14_12', 'R4_SR2_SL11_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('391', 'P001', 'K03_11_13', 'D35_07_13', 'R3_S3_SL14_13', 'R4_SR2_SL11_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('392', 'P001', 'K03_11_14', 'D35_07_14', 'R3_S3_SL14_14', 'R4_SR2_SL11_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('393', 'P001', 'K03_11_15', 'D35_07_15', 'R3_S3_SL14_15', 'R4_SR2_SL11_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('394', 'P001', 'K03_11_16', 'D35_07_16', 'R3_S3_SL14_16', 'R4_SR2_SL11_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('395', 'P001', 'K03_11_17', 'D35_07_17', 'R3_S3_SL14_17', 'R4_SR2_SL11_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('396', 'P001', 'K03_11_18', 'D35_07_18', 'R3_S3_SL14_18', 'R4_SR2_SL11_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('397', 'P001', 'K03_11_19', 'D35_07_19', 'R3_S3_SL14_19', 'R4_SR2_SL11_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('398', 'P001', 'K03_11_20', 'D35_07_20', 'R3_S3_SL14_20', 'R4_SR2_SL11_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('399', 'P001', 'K03_11_21', 'D35_07_21', 'R3_S3_SL14_21', 'R4_SR2_SL11_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('400', 'P001', 'K03_12_01', 'D35_08_01', 'R3_SR3_SL15_1', 'R4_SR2_SL12_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('401', 'P001', 'K03_12_02', 'D35_08_02', 'R3_SR3_SL15_2', 'R4_SR2_SL12_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('402', 'P001', 'K03_12_03', 'D35_08_03', 'R3_SR3_SL15_3', 'R4_SR2_SL12_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('403', 'P001', 'K03_12_04', 'D35_08_04', 'R3_SR3_SL15_4', 'R4_SR2_SL12_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('404', 'P001', 'K03_12_05', 'D35_08_05', 'R3_SR3_SL15_5', 'R4_SR2_SL12_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('405', 'P001', 'K03_12_06', 'D35_08_06', 'R3_SR3_SL15_6', 'R4_SR2_SL12_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('406', 'P001', 'K03_12_07', 'D35_08_07', 'R3_SR3_SL15_7', 'R4_SR2_SL12_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('407', 'P001', 'K03_12_08', 'D35_08_08', 'R3_SR3_SL15_8', 'R4_SR2_SL12_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('408', 'P001', 'K03_12_09', 'D35_08_09', 'R3_SR3_SL15_9', 'R4_SR2_SL12_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('409', 'P001', 'K03_12_10', 'D35_08_10', 'R3_SR3_SL15_10', 'R4_SR2_SL12_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('410', 'P001', 'K03_12_11', 'D35_08_11', 'R3_SR3_SL15_11', 'R4_SR2_SL12_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('411', 'P001', 'K03_12_12', 'D35_08_12', 'R3_SR3_SL15_12', 'R4_SR2_SL12_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('412', 'P001', 'K03_12_13', 'D35_08_13', 'R3_SR3_SL15_13', 'R4_SR2_SL12_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('413', 'P001', 'K03_12_14', 'D35_08_14', 'R3_SR3_SL15_14', 'R4_SR2_SL12_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('414', 'P001', 'K03_12_15', 'D35_08_15', 'R3_SR3_SL15_15', 'R4_SR2_SL12_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('415', 'P001', 'K03_12_16', 'D35_08_16', 'R3_SR3_SL15_16', 'R4_SR2_SL12_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('416', 'P001', 'K03_12_17', 'D35_08_17', 'R3_SR3_SL15_17', 'R4_SR2_SL12_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('417', 'P001', 'K03_12_18', 'D35_08_18', 'R3_SR3_SL15_18', 'R4_SR2_SL12_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('418', 'P001', 'K03_12_19', 'D35_08_19', 'R3_SR3_SL15_19', 'R4_SR2_SL12_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('419', 'P001', 'K03_12_20', 'D35_08_20', 'R3_SR3_SL15_20', 'R4_SR2_SL12_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('420', 'P001', 'K03_12_21', 'D35_08_21', 'R3_SR3_SL15_21', 'R4_SR2_SL12_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('421', 'P001', 'D04_01_01', 'D36_05_01', 'R4_SR1_SL1_1', 'R4_SR1_SL1_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('422', 'P001', 'D04_01_02', 'D36_05_02', 'R4_SR1_SL1_2', 'R4_SR1_SL1_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('423', 'P001', 'D04_01_03', 'D36_05_03', 'R4_SR1_SL1_3', 'R4_SR1_SL1_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('424', 'P001', 'D04_01_04', 'D36_05_04', 'R4_SR1_SL1_4', 'R4_SR1_SL1_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('425', 'P001', 'D04_01_05', 'D36_05_05', 'R4_SR1_SL1_5', 'R4_SR1_SL1_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('426', 'P001', 'D04_01_06', 'D36_05_06', 'R4_SR1_SL1_6', 'R4_SR1_SL1_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('427', 'P001', 'D04_01_07', 'D36_05_07', 'R4_SR1_SL1_7', 'R4_SR1_SL1_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('428', 'P001', 'D04_01_08', 'D36_05_08', 'R4_SR1_SL1_8', 'R4_SR1_SL1_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('429', 'P001', 'D04_01_09', 'D36_05_09', 'R4_SR1_SL1_9', 'R4_SR1_SL1_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('430', 'P001', 'D04_01_10', 'D36_05_10', 'R4_SR1_SL1_10', 'R4_SR1_SL1_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('431', 'P001', 'D04_01_11', 'D36_05_11', 'R4_SR1_SL1_11', 'R4_SR1_SL1_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('432', 'P001', 'D04_01_12', 'D36_05_12', 'R4_SR1_SL1_12', 'R4_SR1_SL1_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('433', 'P001', 'D04_01_13', 'D36_05_13', 'R4_SR1_SL1_13', 'R4_SR1_SL1_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('434', 'P001', 'D04_01_14', 'D36_05_14', 'R4_SR1_SL1_14', 'R4_SR1_SL1_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('435', 'P001', 'D04_01_15', 'D36_05_15', 'R4_SR1_SL1_15', 'R4_SR1_SL1_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('436', 'P001', 'D04_01_16', 'D36_05_16', 'R4_SR1_SL1_16', 'R4_SR1_SL1_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('437', 'P001', 'D04_01_17', 'D36_05_17', 'R4_SR1_SL1_17', 'R4_SR1_SL1_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('438', 'P001', 'D04_01_18', 'D36_05_18', 'R4_SR1_SL1_18', 'R4_SR1_SL1_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('439', 'P001', 'D04_01_19', 'D36_05_19', 'R4_SR1_SL1_19', 'R4_SR1_SL1_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('440', 'P001', 'D04_01_20', 'D36_05_20', 'R4_SR1_SL1_20', 'R4_SR1_SL1_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('441', 'P001', 'D04_01_21', 'D36_05_21', 'R4_SR1_SL1_21', 'R4_SR1_SL1_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('442', 'P001', 'D04_02_01', 'D36_06_01', 'R4_SR1_SL2_1', 'R4_SR1_SL2_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('443', 'P001', 'D04_02_02', 'D36_06_02', 'R4_SR1_SL2_2', 'R4_SR1_SL2_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('444', 'P001', 'D04_02_03', 'D36_06_03', 'R4_SR1_SL2_3', 'R4_SR1_SL2_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('445', 'P001', 'D04_02_04', 'D36_06_04', 'R4_SR1_SL2_4', 'R4_SR1_SL2_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('446', 'P001', 'D04_02_05', 'D36_06_05', 'R4_SR1_SL2_5', 'R4_SR1_SL2_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('447', 'P001', 'D04_02_06', 'D36_06_06', 'R4_SR1_SL2_6', 'R4_SR1_SL2_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('448', 'P001', 'D04_02_07', 'D36_06_07', 'R4_SR1_SL2_7', 'R4_SR1_SL2_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('449', 'P001', 'D04_02_08', 'D36_06_08', 'R4_SR1_SL2_8', 'R4_SR1_SL2_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('450', 'P001', 'D04_02_09', 'D36_06_09', 'R4_SR1_SL2_9', 'R4_SR1_SL2_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('451', 'P001', 'D04_02_10', 'D36_06_10', 'R4_SR1_SL2_10', 'R4_SR1_SL2_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('452', 'P001', 'D04_02_11', 'D36_06_11', 'R4_SR1_SL2_11', 'R4_SR1_SL2_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('453', 'P001', 'D04_02_12', 'D36_06_12', 'R4_SR1_SL2_12', 'R4_SR1_SL2_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('454', 'P001', 'D04_02_13', 'D36_06_13', 'R4_SR1_SL2_13', 'R4_SR1_SL2_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('455', 'P001', 'D04_02_14', 'D36_06_14', 'R4_SR1_SL2_14', 'R4_SR1_SL2_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('456', 'P001', 'D04_02_15', 'D36_06_15', 'R4_SR1_SL2_15', 'R4_SR1_SL2_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('457', 'P001', 'D04_02_16', 'D36_06_16', 'R4_SR1_SL2_16', 'R4_SR1_SL2_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('458', 'P001', 'D04_02_17', 'D36_06_17', 'R4_SR1_SL2_17', 'R4_SR1_SL2_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('459', 'P001', 'D04_02_18', 'D36_06_18', 'R4_SR1_SL2_18', 'R4_SR1_SL2_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('460', 'P001', 'D04_02_19', 'D36_06_19', 'R4_SR1_SL2_19', 'R4_SR1_SL2_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('461', 'P001', 'D04_02_20', 'D36_06_20', 'R4_SR1_SL2_20', 'R4_SR1_SL2_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('462', 'P001', 'D04_02_21', 'D36_06_21', 'R4_SR1_SL2_21', 'R4_SR1_SL2_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('463', 'P001', 'D04_03_01', 'D36_07_01', 'R4_SR1_SL3_1', 'R4_SR1_SL3_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('464', 'P001', 'D04_03_02', 'D36_07_02', 'R4_SR1_SL3_2', 'R4_SR1_SL3_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('465', 'P001', 'D04_03_03', 'D36_07_03', 'R4_SR1_SL3_3', 'R4_SR1_SL3_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('466', 'P001', 'D04_03_04', 'D36_07_04', 'R4_SR1_SL3_4', 'R4_SR1_SL3_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('467', 'P001', 'D04_03_05', 'D36_07_05', 'R4_SR1_SL3_5', 'R4_SR1_SL3_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('468', 'P001', 'D04_03_06', 'D36_07_06', 'R4_SR1_SL3_6', 'R4_SR1_SL3_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('469', 'P001', 'D04_03_07', 'D36_07_07', 'R4_SR1_SL3_7', 'R4_SR1_SL3_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('470', 'P001', 'D04_03_08', 'D36_07_08', 'R4_SR1_SL3_8', 'R4_SR1_SL3_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('471', 'P001', 'D04_03_09', 'D36_07_09', 'R4_SR1_SL3_9', 'R4_SR1_SL3_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('472', 'P001', 'D04_03_10', 'D36_07_10', 'R4_SR1_SL3_10', 'R4_SR1_SL3_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('473', 'P001', 'D04_03_11', 'D36_07_11', 'R4_SR1_SL3_11', 'R4_SR1_SL3_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('474', 'P001', 'D04_03_12', 'D36_07_12', 'R4_SR1_SL3_12', 'R4_SR1_SL3_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('475', 'P001', 'D04_03_13', 'D36_07_13', 'R4_SR1_SL3_13', 'R4_SR1_SL3_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('476', 'P001', 'D04_03_14', 'D36_07_14', 'R4_SR1_SL3_14', 'R4_SR1_SL3_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('477', 'P001', 'D04_03_15', 'D36_07_15', 'R4_SR1_SL3_15', 'R4_SR1_SL3_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('478', 'P001', 'D04_03_16', 'D36_07_16', 'R4_SR1_SL3_16', 'R4_SR1_SL3_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('479', 'P001', 'D04_03_17', 'D36_07_17', 'R4_SR1_SL3_17', 'R4_SR1_SL3_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('480', 'P001', 'D04_03_18', 'D36_07_18', 'R4_SR1_SL3_18', 'R4_SR1_SL3_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('481', 'P001', 'D04_03_19', 'D36_07_19', 'R4_SR1_SL3_19', 'R4_SR1_SL3_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('482', 'P001', 'D04_03_20', 'D36_07_20', 'R4_SR1_SL3_20', 'R4_SR1_SL3_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('483', 'P001', 'D04_03_21', 'D36_07_21', 'R4_SR1_SL3_21', 'R4_SR1_SL3_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('484', 'P001', 'D04_07_01', '', 'R4_SR1_SL13_1', 'R6_SR2_SL15_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('485', 'P001', 'D04_07_02', '', 'R4_SR1_SL13_2', 'R6_SR2_SL15_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('486', 'P001', 'D04_07_03', '', 'R4_SR1_SL13_3', 'R6_SR2_SL15_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('487', 'P001', 'D04_07_04', '', 'R4_SR1_SL13_4', 'R6_SR2_SL15_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('488', 'P001', 'D04_07_05', '', 'R4_SR1_SL13_5', 'R6_SR2_SL15_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('489', 'P001', 'D04_07_06', '', 'R4_SR1_SL13_6', 'R6_SR2_SL15_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('490', 'P001', 'D04_07_07', '', 'R4_SR1_SL13_7', 'R6_SR2_SL15_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('491', 'P001', 'D04_07_08', '', 'R4_SR1_SL13_8', 'R6_SR2_SL15_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('492', 'P001', 'D04_07_09', '', 'R4_SR1_SL13_9', 'R6_SR2_SL15_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('493', 'P001', 'D04_07_10', '', 'R4_SR1_SL13_10', 'R6_SR2_SL15_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('494', 'P001', 'D04_07_11', '', 'R4_SR1_SL13_11', 'R6_SR2_SL15_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('495', 'P001', 'D04_07_12', '', 'R4_SR1_SL13_12', 'R6_SR2_SL15_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('496', 'P001', 'D04_07_13', '', 'R4_SR1_SL13_13', 'R6_SR2_SL15_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('497', 'P001', 'D04_07_14', '', 'R4_SR1_SL13_14', 'R6_SR2_SL15_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('498', 'P001', 'D04_07_15', '', 'R4_SR1_SL13_15', 'R6_SR2_SL15_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('499', 'P001', 'D04_07_16', '', 'R4_SR1_SL13_16', 'R6_SR2_SL15_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('500', 'P001', 'D04_07_17', '', 'R4_SR1_SL13_17', 'R6_SR2_SL15_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('501', 'P001', 'D04_07_18', '', 'R4_SR1_SL13_18', 'R6_SR2_SL15_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('502', 'P001', 'D04_07_19', '', 'R4_SR1_SL13_19', 'R6_SR2_SL15_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('503', 'P001', 'D04_07_20', '', 'R4_SR1_SL13_20', 'R6_SR2_SL15_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('504', 'P001', 'D04_07_21', '', 'R4_SR1_SL13_21', 'R6_SR2_SL15_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('505', 'P001', 'D04_08_01', '', 'R4_SR1_SL14_1', 'R6_SR2_SL15_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('506', 'P001', 'D04_08_02', '', 'R4_SR1_SL14_2', 'R6_SR2_SL15_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('507', 'P001', 'D04_08_03', '', 'R4_SR1_SL14_3', 'R6_SR2_SL15_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('508', 'P001', 'D04_08_04', '', 'R4_SR1_SL14_4', 'R6_SR2_SL15_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('509', 'P001', 'D04_08_05', '', 'R4_SR1_SL14_5', 'R6_SR2_SL15_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('510', 'P001', 'D04_08_06', '', 'R4_SR1_SL14_6', 'R6_SR2_SL15_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('511', 'P001', 'D04_08_07', '', 'R4_SR1_SL14_7', 'R6_SR2_SL15_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('512', 'P001', 'D04_08_08', '', 'R4_SR1_SL14_8', 'R6_SR2_SL15_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('513', 'P001', 'D04_08_09', '', 'R4_SR1_SL14_9', 'R6_SR2_SL15_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('514', 'P001', 'D04_08_10', '', 'R4_SR1_SL14_10', 'R6_SR2_SL15_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('515', 'P001', 'D04_08_11', '', 'R4_SR1_SL14_11', 'R6_SR2_SL15_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('516', 'P001', 'D04_08_12', '', 'R4_SR1_SL14_12', 'R6_SR2_SL15_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('517', 'P001', 'D04_08_13', '', 'R4_SR1_SL14_13', 'R6_SR2_SL15_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('518', 'P001', 'D04_08_14', '', 'R4_SR1_SL14_14', 'R6_SR2_SL15_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('519', 'P001', 'D04_08_15', '', 'R4_SR1_SL14_15', 'R6_SR2_SL15_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('520', 'P001', 'D04_08_16', '', 'R4_SR1_SL14_16', 'R6_SR2_SL15_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('521', 'P001', 'D04_08_17', '', 'R4_SR1_SL14_17', 'R6_SR2_SL15_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('522', 'P001', 'D04_08_18', '', 'R4_SR1_SL14_18', 'R6_SR2_SL15_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('523', 'P001', 'D04_08_19', '', 'R4_SR1_SL14_19', 'R6_SR2_SL15_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('524', 'P001', 'D04_08_20', '', 'R4_SR1_SL14_20', 'R6_SR2_SL15_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('525', 'P001', 'D04_08_21', '', 'R4_SR1_SL14_21', 'R6_SR2_SL15_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('526', 'P001', 'D04_09_01', '', 'R4_SR1_SL15_1', 'R6_SR2_SL15_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('527', 'P001', 'D04_09_02', '', 'R4_SR1_SL15_2', 'R6_SR2_SL15_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('528', 'P001', 'D04_09_03', '', 'R4_SR1_SL15_3', 'R6_SR2_SL15_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('529', 'P001', 'D04_09_04', '', 'R4_SR1_SL15_4', 'R6_SR2_SL15_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('530', 'P001', 'D04_09_05', '', 'R4_SR1_SL15_5', 'R6_SR2_SL15_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('531', 'P001', 'D04_09_06', '', 'R4_SR1_SL15_6', 'R6_SR2_SL15_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('532', 'P001', 'D04_09_07', '', 'R4_SR1_SL15_7', 'R6_SR2_SL15_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('533', 'P001', 'D04_09_08', '', 'R4_SR1_SL15_8', 'R6_SR2_SL15_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('534', 'P001', 'D04_09_09', '', 'R4_SR1_SL15_9', 'R6_SR2_SL15_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('535', 'P001', 'D04_09_10', '', 'R4_SR1_SL15_10', 'R6_SR2_SL15_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('536', 'P001', 'D04_09_11', '', 'R4_SR1_SL15_11', 'R6_SR2_SL15_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('537', 'P001', 'D04_09_12', '', 'R4_SR1_SL15_12', 'R6_SR2_SL15_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('538', 'P001', 'D04_09_13', '', 'R4_SR1_SL15_13', 'R6_SR2_SL15_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('539', 'P001', 'D04_09_14', '', 'R4_SR1_SL15_14', 'R6_SR2_SL15_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('540', 'P001', 'D04_09_15', '', 'R4_SR1_SL15_15', 'R6_SR2_SL15_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('541', 'P001', 'D04_09_16', '', 'R4_SR1_SL15_16', 'R6_SR2_SL15_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('542', 'P001', 'D04_09_17', '', 'R4_SR1_SL15_17', 'R6_SR2_SL15_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('543', 'P001', 'D04_09_18', '', 'R4_SR1_SL15_18', 'R6_SR2_SL15_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('544', 'P001', 'D04_09_19', '', 'R4_SR1_SL15_19', 'R6_SR2_SL15_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('545', 'P001', 'D04_09_20', '', 'R4_SR1_SL15_20', 'R6_SR2_SL15_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('546', 'P001', 'D04_09_21', '', 'R4_SR1_SL15_21', 'R6_SR2_SL15_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('547', 'P001', 'D04_10_01', 'C35_05_01', 'R4_SR2_SL1_1', 'R2_SR2_SL12_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('548', 'P001', 'D04_10_02', 'C35_05_02', 'R4_SR2_SL1_2', 'R2_SR2_SL12_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('549', 'P001', 'D04_10_03', 'C35_05_03', 'R4_SR2_SL1_3', 'R2_SR2_SL12_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('550', 'P001', 'D04_10_04', 'C35_05_04', 'R4_SR2_SL1_4', 'R2_SR2_SL12_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('551', 'P001', 'D04_10_05', 'C35_05_05', 'R4_SR2_SL1_5', 'R2_SR2_SL12_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('552', 'P001', 'D04_10_06', 'C35_05_06', 'R4_SR2_SL1_6', 'R2_SR2_SL12_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('553', 'P001', 'D04_10_07', 'C35_05_07', 'R4_SR2_SL1_7', 'R2_SR2_SL12_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('554', 'P001', 'D04_10_08', 'C35_05_08', 'R4_SR2_SL1_8', 'R2_SR2_SL12_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('555', 'P001', 'D04_10_09', 'C35_05_09', 'R4_SR2_SL1_9', 'R2_SR2_SL12_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('556', 'P001', 'D04_10_10', 'C35_05_10', 'R4_SR2_SL1_10', 'R2_SR2_SL12_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('557', 'P001', 'D04_10_11', 'C35_05_11', 'R4_SR2_SL1_11', 'R2_SR2_SL12_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('558', 'P001', 'D04_10_12', 'C35_05_12', 'R4_SR2_SL1_12', 'R2_SR2_SL12_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('559', 'P001', 'D04_10_13', 'C35_05_13', 'R4_SR2_SL1_13', 'R2_SR2_SL12_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('560', 'P001', 'D04_10_14', 'C35_05_14', 'R4_SR2_SL1_14', 'R2_SR2_SL12_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('561', 'P001', 'D04_10_15', 'C35_05_15', 'R4_SR2_SL1_15', 'R2_SR2_SL12_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('562', 'P001', 'D04_10_16', 'C35_05_16', 'R4_SR2_SL1_16', 'R2_SR2_SL12_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('563', 'P001', 'D04_10_17', 'C35_05_17', 'R4_SR2_SL1_17', 'R2_SR2_SL12_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('564', 'P001', 'D04_10_18', 'C35_05_18', 'R4_SR2_SL1_18', 'R2_SR2_SL12_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('565', 'P001', 'D04_10_19', 'C35_05_19', 'R4_SR2_SL1_19', 'R2_SR2_SL12_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('566', 'P001', 'D04_10_20', 'C35_05_20', 'R4_SR2_SL1_20', 'R2_SR2_SL12_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('567', 'P001', 'D04_10_21', 'C35_05_21', 'R4_SR2_SL1_21', 'R2_SR2_SL12_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('568', 'P001', 'D04_12_01', 'C35_07_01', 'R4_SR2_SL3_01', 'R1_SR2_SL15_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('569', 'P001', 'D04_12_02', 'C35_07_02', 'R4_SR2_SL3_02', 'R1_SR2_SL15_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('570', 'P001', 'D04_12_03', 'C35_07_03', 'R4_SR2_SL3_03', 'R1_SR2_SL15_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('571', 'P001', 'D04_12_04', 'C35_07_04', 'R4_SR2_SL3_04', 'R1_SR2_SL15_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('572', 'P001', 'D04_12_05', 'C35_07_05', 'R4_SR2_SL3_05', 'R1_SR2_SL15_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('573', 'P001', 'D04_12_06', 'C35_07_06', 'R4_SR2_SL3_06', 'R1_SR2_SL15_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('574', 'P001', 'D04_12_07', 'C35_07_07', 'R4_SR2_SL3_07', 'R1_SR2_SL15_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('575', 'P001', 'D04_12_08', 'C35_07_08', 'R4_SR2_SL3_08', 'R1_SR2_SL15_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('576', 'P001', 'D04_12_09', 'C35_07_09', 'R4_SR2_SL3_09', 'R1_SR2_SL15_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('577', 'P001', 'D05_07_01', 'C35_08_01', 'R4_SR3_SL1_1', 'R4_SR2_SL13_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('578', 'P001', 'D05_07_02', 'C35_08_02', 'R4_SR3_SL1_2', 'R4_SR2_SL13_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('579', 'P001', 'D05_07_03', 'C35_08_03', 'R4_SR3_SL1_3', 'R4_SR2_SL13_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('580', 'P001', 'D05_07_04', 'C35_08_04', 'R4_SR3_SL1_4', 'R4_SR2_SL13_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('581', 'P001', 'D05_07_05', 'C35_08_05', 'R4_SR3_SL1_5', 'R4_SR2_SL13_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('582', 'P001', 'D05_07_06', 'C35_08_06', 'R4_SR3_SL1_6', 'R4_SR2_SL13_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('583', 'P001', 'D05_07_07', 'C35_08_07', 'R4_SR3_SL1_7', 'R4_SR2_SL13_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('584', 'P001', 'D05_07_08', 'C35_08_08', 'R4_SR3_SL1_8', 'R4_SR2_SL13_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('585', 'P001', 'D05_07_09', 'C35_08_09', 'R4_SR3_SL1_9', 'R4_SR2_SL13_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('586', 'P001', 'D05_07_10', 'C35_08_10', 'R4_SR3_SL1_10', 'R4_SR2_SL13_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('587', 'P001', 'D05_07_11', 'C35_08_11', 'R4_SR3_SL1_11', 'R4_SR2_SL13_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('588', 'P001', 'D05_07_12', 'C35_08_12', 'R4_SR3_SL1_12', 'R4_SR2_SL13_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('589', 'P001', 'D05_07_13', 'C35_08_13', 'R4_SR3_SL1_13', 'R4_SR2_SL13_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('590', 'P001', 'D05_07_14', 'C35_08_14', 'R4_SR3_SL1_14', 'R4_SR2_SL13_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('591', 'P001', 'D05_07_15', 'C35_08_15', 'R4_SR3_SL1_15', 'R4_SR2_SL13_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('592', 'P001', 'D05_07_16', 'C35_08_16', 'R4_SR3_SL1_16', 'R4_SR2_SL13_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('593', 'P001', 'D05_07_17', 'C35_08_17', 'R4_SR3_SL1_17', 'R4_SR2_SL13_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('594', 'P001', 'D05_07_18', 'C35_08_18', 'R4_SR3_SL1_18', 'R4_SR2_SL13_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('595', 'P001', 'D05_07_19', 'C35_08_19', 'R4_SR3_SL1_19', 'R4_SR2_SL13_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('596', 'P001', 'D05_07_20', 'C35_08_20', 'R4_SR3_SL1_20', 'R4_SR2_SL13_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('597', 'P001', 'D05_07_21', 'C35_08_21', 'R4_SR3_SL1_21', 'R4_SR2_SL13_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('598', 'P001', 'D05_08_01', 'C35_09_01', 'R4_SR3_SL2_1', 'R4_SR2_SL14_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('599', 'P001', 'D05_08_02', 'C35_09_02', 'R4_SR3_SL2_2', 'R4_SR2_SL14_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('600', 'P001', 'D05_08_03', 'C35_09_03', 'R4_SR3_SL2_3', 'R4_SR2_SL14_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('601', 'P001', 'D05_08_04', 'C35_09_04', 'R4_SR3_SL2_4', 'R4_SR2_SL14_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('602', 'P001', 'D05_08_05', 'C35_09_05', 'R4_SR3_SL2_5', 'R4_SR2_SL14_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('603', 'P001', 'D05_08_06', 'C35_09_06', 'R4_SR3_SL2_6', 'R4_SR2_SL14_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('604', 'P001', 'D05_08_07', 'C35_09_07', 'R4_SR3_SL2_7', 'R4_SR2_SL14_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('605', 'P001', 'D05_08_08', 'C35_09_08', 'R4_SR3_SL2_8', 'R4_SR2_SL14_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('606', 'P001', 'D05_08_09', 'C35_09_09', 'R4_SR3_SL2_9', 'R4_SR2_SL14_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('607', 'P001', 'D05_08_10', 'C35_09_10', 'R4_SR3_SL2_10', 'R4_SR2_SL14_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('608', 'P001', 'D05_08_11', 'C35_09_11', 'R4_SR3_SL2_11', 'R4_SR2_SL14_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('609', 'P001', 'D05_08_12', 'C35_09_12', 'R4_SR3_SL2_12', 'R4_SR2_SL14_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('610', 'P001', 'D05_08_13', 'C35_09_13', 'R4_SR3_SL2_13', 'R4_SR2_SL14_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('611', 'P001', 'D05_08_14', 'C35_09_14', 'R4_SR3_SL2_14', 'R4_SR2_SL14_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('612', 'P001', 'D05_08_15', 'C35_09_15', 'R4_SR3_SL2_15', 'R4_SR2_SL14_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('613', 'P001', 'D05_08_16', 'C35_09_16', 'R4_SR3_SL2_16', 'R4_SR2_SL14_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('614', 'P001', 'D05_08_17', 'C35_09_17', 'R4_SR3_SL2_17', 'R4_SR2_SL14_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('615', 'P001', 'D05_08_18', 'C35_09_18', 'R4_SR3_SL2_18', 'R4_SR2_SL14_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('616', 'P001', 'D05_08_19', 'C35_09_19', 'R4_SR3_SL2_19', 'R4_SR2_SL14_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('617', 'P001', 'D05_08_20', 'C35_09_20', 'R4_SR3_SL2_20', 'R4_SR2_SL14_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('618', 'P001', 'D05_08_21', 'C35_09_21', 'R4_SR3_SL2_21', 'R4_SR2_SL14_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('619', 'P001', 'D05_09_01', 'C35_10_01', 'R4_SR3_SL3_1', 'R4_SR2_SL15_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('620', 'P001', 'D05_09_02', 'C35_10_02', 'R4_SR3_SL3_2', 'R4_SR2_SL15_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('621', 'P001', 'D05_09_03', 'C35_10_03', 'R4_SR3_SL3_3', 'R4_SR2_SL15_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('622', 'P001', 'D05_09_04', 'C35_10_04', 'R4_SR3_SL3_4', 'R4_SR2_SL15_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('623', 'P001', 'D05_09_05', 'C35_10_05', 'R4_SR3_SL3_5', 'R4_SR2_SL15_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('624', 'P001', 'D05_09_06', 'C35_10_06', 'R4_SR3_SL3_6', 'R4_SR2_SL15_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('625', 'P001', 'D05_09_07', 'C35_10_07', 'R4_SR3_SL3_7', 'R4_SR2_SL15_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('626', 'P001', 'D05_09_08', 'C35_10_08', 'R4_SR3_SL3_8', 'R4_SR2_SL15_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('627', 'P001', 'D05_09_09', 'C35_10_09', 'R4_SR3_SL3_9', 'R4_SR2_SL15_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('628', 'P001', 'D05_09_10', 'C35_10_10', 'R4_SR3_SL3_10', 'R4_SR2_SL15_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('629', 'P001', 'D05_09_11', 'C35_10_11', 'R4_SR3_SL3_11', 'R4_SR2_SL15_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('630', 'P001', 'D05_09_12', 'C35_10_12', 'R4_SR3_SL3_12', 'R4_SR2_SL15_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('631', 'P001', 'D05_09_13', 'C35_10_13', 'R4_SR3_SL3_13', 'R4_SR2_SL15_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('632', 'P001', 'D05_09_14', 'C35_10_14', 'R4_SR3_SL3_14', 'R4_SR2_SL15_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('633', 'P001', 'D05_09_15', 'C35_10_15', 'R4_SR3_SL3_15', 'R4_SR2_SL15_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('634', 'P001', 'D05_09_16', 'C35_10_16', 'R4_SR3_SL3_16', 'R4_SR2_SL15_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('635', 'P001', 'D05_09_17', 'C35_10_17', 'R4_SR3_SL3_17', 'R4_SR2_SL15_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('636', 'P001', 'D05_09_18', 'C35_10_18', 'R4_SR3_SL3_18', 'R4_SR2_SL15_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('637', 'P001', 'D05_09_19', 'C35_10_19', 'R4_SR3_SL3_19', 'R4_SR2_SL15_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('638', 'P001', 'D05_09_20', 'C35_10_20', 'R4_SR3_SL3_20', 'R4_SR2_SL15_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('639', 'P001', 'D05_09_21', 'C35_10_21', 'R4_SR3_SL3_21', 'R4_SR2_SL15_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('640', 'P001', 'D05_10_01', 'D34_01_01', 'R4_SR3_SL4_1', 'R4_SR3_SL1_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('641', 'P001', 'D05_10_02', 'D34_01_02', 'R4_SR3_SL4_2', 'R4_SR3_SL1_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('642', 'P001', 'D05_10_03', 'D34_01_03', 'R4_SR3_SL4_3', 'R4_SR3_SL1_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('643', 'P001', 'D05_10_04', 'D34_01_04', 'R4_SR3_SL4_4', 'R4_SR3_SL1_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('644', 'P001', 'D05_10_05', 'D34_01_05', 'R4_SR3_SL4_5', 'R4_SR3_SL1_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('645', 'P001', 'D05_10_06', 'D34_01_06', 'R4_SR3_SL4_6', 'R4_SR3_SL1_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('646', 'P001', 'D05_10_07', 'D34_01_07', 'R4_SR3_SL4_7', 'R4_SR3_SL1_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('647', 'P001', 'D05_10_08', 'D34_01_08', 'R4_SR3_SL4_8', 'R4_SR3_SL1_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('648', 'P001', 'D05_10_09', 'D34_01_09', 'R4_SR3_SL4_9', 'R4_SR3_SL1_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('649', 'P001', 'D05_10_10', 'D34_01_10', 'R4_SR3_SL4_10', 'R4_SR3_SL1_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('650', 'P001', 'D05_10_11', 'D34_01_11', 'R4_SR3_SL4_11', 'R4_SR3_SL1_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('651', 'P001', 'D05_10_12', 'D34_01_12', 'R4_SR3_SL4_12', 'R4_SR3_SL1_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('652', 'P001', 'D05_10_13', 'D34_01_13', 'R4_SR3_SL4_13', 'R4_SR3_SL1_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('653', 'P001', 'D05_10_14', 'D34_01_14', 'R4_SR3_SL4_14', 'R4_SR3_SL1_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('654', 'P001', 'D05_10_15', 'D34_01_15', 'R4_SR3_SL4_15', 'R4_SR3_SL1_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('655', 'P001', 'D05_10_16', 'D34_01_16', 'R4_SR3_SL4_16', 'R4_SR3_SL1_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('656', 'P001', 'D05_10_17', 'D34_01_17', 'R4_SR3_SL4_17', 'R4_SR3_SL1_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('657', 'P001', 'D05_10_18', 'D34_01_18', 'R4_SR3_SL4_18', 'R4_SR3_SL1_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('658', 'P001', 'D05_10_19', 'D34_01_19', 'R4_SR3_SL4_19', 'R4_SR3_SL1_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('659', 'P001', 'D05_10_20', 'D34_01_20', 'R4_SR3_SL4_20', 'R4_SR3_SL1_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('660', 'P001', 'D05_10_21', 'D34_01_21', 'R4_SR3_SL4_21', 'R4_SR3_SL1_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('661', 'P001', 'D05_11_01', 'D34_02_01', 'R4_SR3_SL11_1', 'R4_SR3_SL2_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('662', 'P001', 'D05_11_02', 'D34_02_02', 'R4_SR3_SL11_2', 'R4_SR3_SL2_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('663', 'P001', 'D05_11_03', 'D34_02_03', 'R4_SR3_SL11_3', 'R4_SR3_SL2_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('664', 'P001', 'D05_11_04', 'D34_02_04', 'R4_SR3_SL11_4', 'R4_SR3_SL2_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('665', 'P001', 'D05_11_05', 'D34_02_05', 'R4_SR3_SL11_5', 'R4_SR3_SL2_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('666', 'P001', 'D05_11_06', 'D34_02_06', 'R4_SR3_SL11_6', 'R4_SR3_SL2_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('667', 'P001', 'D05_11_07', 'D34_02_07', 'R4_SR3_SL11_7', 'R4_SR3_SL2_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('668', 'P001', 'D05_11_08', 'D34_02_08', 'R4_SR3_SL11_8', 'R4_SR3_SL2_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('669', 'P001', 'D05_11_09', 'D34_02_09', 'R4_SR3_SL11_9', 'R4_SR3_SL2_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('670', 'P001', 'D05_11_10', 'D34_02_10', 'R4_SR3_SL11_10', 'R4_SR3_SL2_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('671', 'P001', 'D05_11_11', 'D34_02_11', 'R4_SR3_SL11_11', 'R4_SR3_SL2_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('672', 'P001', 'D05_11_12', 'D34_02_12', 'R4_SR3_SL11_12', 'R4_SR3_SL2_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('673', 'P001', 'D05_11_13', 'D34_02_13', 'R4_SR3_SL11_13', 'R4_SR3_SL2_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('674', 'P001', 'D05_11_14', 'D34_02_14', 'R4_SR3_SL11_14', 'R4_SR3_SL2_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('675', 'P001', 'D05_11_15', 'D34_02_15', 'R4_SR3_SL11_15', 'R4_SR3_SL2_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('676', 'P001', 'D05_11_16', 'D34_02_16', 'R4_SR3_SL11_16', 'R4_SR3_SL2_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('677', 'P001', 'D05_11_17', 'D34_02_17', 'R4_SR3_SL11_17', 'R4_SR3_SL2_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('678', 'P001', 'D05_11_18', 'D34_02_18', 'R4_SR3_SL11_18', 'R4_SR3_SL2_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('679', 'P001', 'D05_11_19', 'D34_02_19', 'R4_SR3_SL11_19', 'R4_SR3_SL2_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('680', 'P001', 'D05_11_20', 'D34_02_20', 'R4_SR3_SL11_20', 'R4_SR3_SL2_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('681', 'P001', 'D05_11_21', 'D34_02_21', 'R4_SR3_SL11_21', 'R4_SR3_SL2_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('682', 'P001', 'D05_12_01', '', 'R4_SR3_SL12_1', 'R4_SR3_SL3_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('683', 'P001', 'D05_12_02', '', 'R4_SR3_SL12_2', 'R4_SR3_SL3_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('684', 'P001', 'D05_12_03', '', 'R4_SR3_SL12_3', 'R4_SR3_SL3_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('685', 'P001', 'D05_12_04', '', 'R4_SR3_SL12_4', 'R4_SR3_SL3_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('686', 'P001', 'D05_12_05', '', 'R4_SR3_SL12_5', 'R4_SR3_SL3_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('687', 'P001', 'D05_12_06', '', 'R4_SR3_SL12_6', 'R4_SR3_SL3_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('688', 'P001', 'D05_12_07', '', 'R4_SR3_SL12_7', 'R4_SR3_SL3_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('689', 'P001', 'D05_12_08', '', 'R4_SR3_SL12_8', 'R4_SR3_SL3_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('690', 'P001', 'D05_12_09', '', 'R4_SR3_SL12_9', 'R4_SR3_SL3_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('691', 'P001', 'D05_12_10', '', 'R4_SR3_SL12_10', 'R4_SR3_SL3_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('692', 'P001', 'D05_12_11', '', 'R4_SR3_SL12_11', 'R4_SR3_SL3_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('693', 'P001', 'D05_12_12', '', 'R4_SR3_SL12_12', 'R4_SR3_SL3_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('694', 'P001', 'D05_12_13', '', 'R4_SR3_SL12_13', 'R4_SR3_SL3_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('695', 'P001', 'D05_12_14', '', 'R4_SR3_SL12_14', 'R4_SR3_SL3_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('696', 'P001', 'D05_12_15', '', 'R4_SR3_SL12_15', 'R4_SR3_SL3_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('697', 'P001', 'D05_12_16', '', 'R4_SR3_SL12_16', 'R4_SR3_SL3_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('698', 'P001', 'D05_12_17', '', 'R4_SR3_SL12_17', 'R4_SR3_SL3_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('699', 'P001', 'D05_12_18', '', 'R4_SR3_SL12_18', 'R4_SR3_SL3_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('700', 'P001', 'D05_12_19', '', 'R4_SR3_SL12_19', 'R4_SR3_SL3_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('701', 'P001', 'D05_12_20', '', 'R4_SR3_SL12_20', 'R4_SR3_SL3_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('702', 'P001', 'D05_12_21', '', 'R4_SR3_SL12_21', 'R4_SR3_SL3_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('703', 'P001', 'D06_01_01', '', 'R4_SR3_SL13_1', 'R4_SR3_SL4_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('704', 'P001', 'D06_01_02', '', 'R4_SR3_SL13_2', 'R4_SR3_SL4_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('705', 'P001', 'D06_01_03', '', 'R4_SR3_SL13_3', 'R4_SR3_SL4_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('706', 'P001', 'D06_01_04', '', 'R4_SR3_SL13_4', 'R4_SR3_SL4_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('707', 'P001', 'D06_01_05', '', 'R4_SR3_SL13_5', 'R4_SR3_SL4_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('708', 'P001', 'D06_01_06', '', 'R4_SR3_SL13_6', 'R4_SR3_SL4_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('709', 'P001', 'D06_01_07', '', 'R4_SR3_SL13_7', 'R4_SR3_SL4_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('710', 'P001', 'D06_01_08', '', 'R4_SR3_SL13_8', 'R4_SR3_SL4_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('711', 'P001', 'D06_01_09', '', 'R4_SR3_SL13_9', 'R4_SR3_SL4_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('712', 'P001', 'D06_01_10', '', 'R4_SR3_SL13_10', 'R4_SR3_SL4_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('713', 'P001', 'D06_01_11', '', 'R4_SR3_SL13_11', 'R4_SR3_SL4_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('714', 'P001', 'D06_01_12', '', 'R4_SR3_SL13_12', 'R4_SR3_SL4_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('715', 'P001', 'D06_01_13', '', 'R4_SR3_SL13_13', 'R4_SR3_SL4_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('716', 'P001', 'D06_01_14', '', 'R4_SR3_SL13_14', 'R4_SR3_SL4_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('717', 'P001', 'D06_01_15', '', 'R4_SR3_SL13_15', 'R4_SR3_SL4_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('718', 'P001', 'D06_01_16', '', 'R4_SR3_SL13_16', 'R4_SR3_SL4_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('719', 'P001', 'D06_01_17', '', 'R4_SR3_SL13_17', 'R4_SR3_SL4_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('720', 'P001', 'D06_01_18', '', 'R4_SR3_SL13_18', 'R4_SR3_SL4_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('721', 'P001', 'D06_01_19', '', 'R4_SR3_SL13_19', 'R4_SR3_SL4_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('722', 'P001', 'D06_01_20', '', 'R4_SR3_SL13_20', 'R4_SR3_SL4_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('723', 'P001', 'D06_01_21', '', 'R4_SR3_SL13_21', 'R4_SR3_SL4_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('724', 'P001', 'D06_02_01', '', 'R4_SR3_SL14_1', 'R4_SR3_SL11_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('725', 'P001', 'D06_02_02', '', 'R4_SR3_SL14_2', 'R4_SR3_SL11_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('726', 'P001', 'D06_02_03', '', 'R4_SR3_SL14_3', 'R4_SR3_SL11_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('727', 'P001', 'D06_02_04', '', 'R4_SR3_SL14_4', 'R4_SR3_SL11_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('728', 'P001', 'D06_02_05', '', 'R4_SR3_SL14_5', 'R4_SR3_SL11_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('729', 'P001', 'D06_02_06', '', 'R4_SR3_SL14_6', 'R4_SR3_SL11_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('730', 'P001', 'D06_02_07', '', 'R4_SR3_SL14_7', 'R4_SR3_SL11_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('731', 'P001', 'D06_02_08', '', 'R4_SR3_SL14_8', 'R4_SR3_SL11_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('732', 'P001', 'D06_02_09', '', 'R4_SR3_SL14_9', 'R4_SR3_SL11_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('733', 'P001', 'D06_02_10', '', 'R4_SR3_SL14_10', 'R4_SR3_SL11_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('734', 'P001', 'D06_02_11', '', 'R4_SR3_SL14_11', 'R4_SR3_SL11_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('735', 'P001', 'D06_02_12', '', 'R4_SR3_SL14_12', 'R4_SR3_SL11_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('736', 'P001', 'D06_02_13', '', 'R4_SR3_SL14_13', 'R4_SR3_SL11_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('737', 'P001', 'D06_02_14', '', 'R4_SR3_SL14_14', 'R4_SR3_SL11_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('738', 'P001', 'D06_02_15', '', 'R4_SR3_SL14_15', 'R4_SR3_SL11_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('739', 'P001', 'D06_02_16', '', 'R4_SR3_SL14_16', 'R4_SR3_SL11_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('740', 'P001', 'D06_02_17', '', 'R4_SR3_SL14_17', 'R4_SR3_SL11_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('741', 'P001', 'D06_02_18', '', 'R4_SR3_SL14_18', 'R4_SR3_SL11_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('742', 'P001', 'D06_02_19', '', 'R4_SR3_SL14_19', 'R4_SR3_SL11_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('743', 'P001', 'D06_02_20', '', 'R4_SR3_SL14_20', 'R4_SR3_SL11_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('744', 'P001', 'D06_02_21', '', 'R4_SR3_SL14_21', 'R4_SR3_SL11_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('745', 'P001', 'D06_03_01', '', 'R4_SR3_SL15_1', 'R4_SR3_SL12_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('746', 'P001', 'D06_03_02', '', 'R4_SR3_SL15_2', 'R4_SR3_SL12_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('747', 'P001', 'D06_03_03', '', 'R4_SR3_SL15_3', 'R4_SR3_SL12_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('748', 'P001', 'D06_03_04', '', 'R4_SR3_SL15_4', 'R4_SR3_SL12_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('749', 'P001', 'D06_03_05', '', 'R4_SR3_SL15_5', 'R4_SR3_SL12_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('750', 'P001', 'D06_03_06', '', 'R4_SR3_SL15_6', 'R4_SR3_SL12_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('751', 'P001', 'D06_03_07', '', 'R4_SR3_SL15_7', 'R4_SR3_SL12_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('752', 'P001', 'D06_03_08', '', 'R4_SR3_SL15_8', 'R4_SR3_SL12_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('753', 'P001', 'D06_03_09', '', 'R4_SR3_SL15_9', 'R4_SR3_SL12_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('754', 'P001', 'D06_03_10', '', 'R4_SR3_SL15_10', 'R4_SR3_SL12_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('755', 'P001', 'D06_03_11', '', 'R4_SR3_SL15_11', 'R4_SR3_SL12_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('756', 'P001', 'D06_03_12', '', 'R4_SR3_SL15_12', 'R4_SR3_SL12_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('757', 'P001', 'D06_03_13', '', 'R4_SR3_SL15_13', 'R4_SR3_SL12_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('758', 'P001', 'D06_03_14', '', 'R4_SR3_SL15_14', 'R4_SR3_SL12_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('759', 'P001', 'D06_03_15', '', 'R4_SR3_SL15_15', 'R4_SR3_SL12_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('760', 'P001', 'D06_03_16', '', 'R4_SR3_SL15_16', 'R4_SR3_SL12_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('761', 'P001', 'D06_03_17', '', 'R4_SR3_SL15_17', 'R4_SR3_SL12_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('762', 'P001', 'D06_03_18', '', 'R4_SR3_SL15_18', 'R4_SR3_SL12_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('763', 'P001', 'D06_03_19', '', 'R4_SR3_SL15_19', 'R4_SR3_SL12_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('764', 'P001', 'D06_03_20', '', 'R4_SR3_SL15_20', 'R4_SR3_SL12_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('765', 'P001', 'D06_03_21', '', 'R4_SR3_SL15_21', 'R4_SR3_SL12_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('766', 'P001', 'D06_04_01', '', 'R5_SR1_SL1_1', 'R4_SR3_SL13_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('767', 'P001', 'D06_04_02', '', 'R5_SR1_SL1_2', 'R4_SR3_SL13_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('768', 'P001', 'D06_04_03', '', 'R5_SR1_SL1_3', 'R4_SR3_SL13_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('769', 'P001', 'D06_04_04', '', 'R5_SR1_SL1_4', 'R4_SR3_SL13_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('770', 'P001', 'D06_04_05', '', 'R5_SR1_SL1_5', 'R4_SR3_SL13_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('771', 'P001', 'D06_04_06', '', 'R5_SR1_SL1_6', 'R4_SR3_SL13_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('772', 'P001', 'D06_04_07', '', 'R5_SR1_SL1_7', 'R4_SR3_SL13_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('773', 'P001', 'D06_04_08', '', 'R5_SR1_SL1_8', 'R4_SR3_SL13_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('774', 'P001', 'D06_04_09', '', 'R5_SR1_SL1_9', 'R4_SR3_SL13_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('775', 'P001', 'D06_04_10', '', 'R5_SR1_SL1_10', 'R4_SR3_SL13_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('776', 'P001', 'D06_04_11', '', 'R5_SR1_SL1_11', 'R4_SR3_SL13_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('777', 'P001', 'D06_04_12', '', 'R5_SR1_SL1_12', 'R4_SR3_SL13_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('778', 'P001', 'D06_04_13', '', 'R5_SR1_SL1_13', 'R4_SR3_SL13_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('779', 'P001', 'D06_04_14', '', 'R5_SR1_SL1_14', 'R4_SR3_SL13_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('780', 'P001', 'D06_04_15', '', 'R5_SR1_SL1_15', 'R4_SR3_SL13_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('781', 'P001', 'D06_04_16', '', 'R5_SR1_SL1_16', 'R4_SR3_SL13_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('782', 'P001', 'D06_04_17', '', 'R5_SR1_SL1_17', 'R4_SR3_SL13_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('783', 'P001', 'D06_04_18', '', 'R5_SR1_SL1_18', 'R4_SR3_SL13_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('784', 'P001', 'D06_04_19', '', 'R5_SR1_SL1_19', 'R4_SR3_SL13_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('785', 'P001', 'D06_04_20', '', 'R5_SR1_SL1_20', 'R4_SR3_SL13_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('786', 'P001', 'D06_04_21', '', 'R5_SR1_SL1_21', 'R4_SR3_SL13_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('787', 'P001', 'D06_05_01', '', 'R5_SR1_SL2_1', 'R4_SR3_SL14_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('788', 'P001', 'D06_05_02', '', 'R5_SR1_SL2_2', 'R4_SR3_SL14_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('789', 'P001', 'D06_05_03', '', 'R5_SR1_SL2_3', 'R4_SR3_SL14_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('790', 'P001', 'D06_05_04', '', 'R5_SR1_SL2_4', 'R4_SR3_SL14_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('791', 'P001', 'D06_05_05', '', 'R5_SR1_SL2_5', 'R4_SR3_SL14_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('792', 'P001', 'D06_05_06', '', 'R5_SR1_SL2_6', 'R4_SR3_SL14_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('793', 'P001', 'D06_05_07', '', 'R5_SR1_SL2_7', 'R4_SR3_SL14_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('794', 'P001', 'D06_05_08', '', 'R5_SR1_SL2_8', 'R4_SR3_SL14_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('795', 'P001', 'D06_05_09', '', 'R5_SR1_SL2_9', 'R4_SR3_SL14_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('796', 'P001', 'D06_05_10', '', 'R5_SR1_SL2_10', 'R4_SR3_SL14_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('797', 'P001', 'D06_05_11', '', 'R5_SR1_SL2_11', 'R4_SR3_SL14_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('798', 'P001', 'D06_05_12', '', 'R5_SR1_SL2_12', 'R4_SR3_SL14_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('799', 'P001', 'D06_05_13', '', 'R5_SR1_SL2_13', 'R4_SR3_SL14_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('800', 'P001', 'D06_05_14', '', 'R5_SR1_SL2_14', 'R4_SR3_SL14_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('801', 'P001', 'D06_05_15', '', 'R5_SR1_SL2_15', 'R4_SR3_SL14_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('802', 'P001', 'D06_05_16', '', 'R5_SR1_SL2_16', 'R4_SR3_SL14_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('803', 'P001', 'D06_05_17', '', 'R5_SR1_SL2_17', 'R4_SR3_SL14_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('804', 'P001', 'D06_05_18', '', 'R5_SR1_SL2_18', 'R4_SR3_SL14_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('805', 'P001', 'D06_05_19', '', 'R5_SR1_SL2_19', 'R4_SR3_SL14_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('806', 'P001', 'D06_05_20', '', 'R5_SR1_SL2_20', 'R4_SR3_SL14_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('807', 'P001', 'D06_05_21', '', 'R5_SR1_SL2_21', 'R4_SR3_SL14_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('808', 'P001', 'D06_06_01', '', 'R5_SR1_SL3_1', 'R4_SR3_SL15_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('809', 'P001', 'D06_06_02', '', 'R5_SR1_SL3_2', 'R4_SR3_SL15_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('810', 'P001', 'D06_06_03', '', 'R5_SR1_SL3_3', 'R4_SR3_SL15_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('811', 'P001', 'D06_06_04', '', 'R5_SR1_SL3_4', 'R4_SR3_SL15_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('812', 'P001', 'D06_06_05', '', 'R5_SR1_SL3_5', 'R4_SR3_SL15_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('813', 'P001', 'D06_06_06', '', 'R5_SR1_SL3_6', 'R4_SR3_SL15_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('814', 'P001', 'D06_06_07', '', 'R5_SR1_SL3_7', 'R4_SR3_SL15_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('815', 'P001', 'D06_06_08', '', 'R5_SR1_SL3_8', 'R4_SR3_SL15_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('816', 'P001', 'D06_06_09', '', 'R5_SR1_SL3_9', 'R4_SR3_SL15_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('817', 'P001', 'D06_06_10', '', 'R5_SR1_SL3_10', 'R4_SR3_SL15_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('818', 'P001', 'D06_06_11', '', 'R5_SR1_SL3_11', 'R4_SR3_SL15_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('819', 'P001', 'D06_06_12', '', 'R5_SR1_SL3_12', 'R4_SR3_SL15_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('820', 'P001', 'D06_06_13', '', 'R5_SR1_SL3_13', 'R4_SR3_SL15_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('821', 'P001', 'D06_06_14', '', 'R5_SR1_SL3_14', 'R4_SR3_SL15_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('822', 'P001', 'D06_06_15', '', 'R5_SR1_SL3_15', 'R4_SR3_SL15_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('823', 'P001', 'D06_06_16', '', 'R5_SR1_SL3_16', 'R4_SR3_SL15_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('824', 'P001', 'D06_06_17', '', 'R5_SR1_SL3_17', 'R4_SR3_SL15_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('825', 'P001', 'D06_06_18', '', 'R5_SR1_SL3_18', 'R4_SR3_SL15_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('826', 'P001', 'D06_06_19', '', 'R5_SR1_SL3_19', 'R4_SR3_SL15_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('827', 'P001', 'D06_06_20', '', 'R5_SR1_SL3_20', 'R4_SR3_SL15_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('828', 'P001', 'D06_06_21', '', 'R5_SR1_SL3_21', 'R4_SR3_SL15_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('829', 'P001', 'D06_07_01', 'D34_10_01', 'R5_SR1_SL4_1', 'R5_SR1_SL1_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('830', 'P001', 'D06_07_02', 'D34_10_02', 'R5_SR1_SL4_2', 'R5_SR1_SL1_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('831', 'P001', 'D06_07_03', 'D34_10_03', 'R5_SR1_SL4_3', 'R5_SR1_SL1_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('832', 'P001', 'D06_07_04', 'D34_10_04', 'R5_SR1_SL4_4', 'R5_SR1_SL1_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('833', 'P001', 'D06_07_05', 'D34_10_05', 'R5_SR1_SL4_5', 'R5_SR1_SL1_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('834', 'P001', 'D06_07_06', 'D34_10_06', 'R5_SR1_SL4_6', 'R5_SR1_SL1_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('835', 'P001', 'D06_07_07', 'D34_10_07', 'R5_SR1_SL4_7', 'R5_SR1_SL1_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('836', 'P001', 'D06_07_08', 'D34_10_08', 'R5_SR1_SL4_8', 'R5_SR1_SL1_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('837', 'P001', 'D06_07_09', 'D34_10_09', 'R5_SR1_SL4_9', 'R5_SR1_SL1_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('838', 'P001', 'D06_07_10', 'D34_10_10', 'R5_SR1_SL4_10', 'R5_SR1_SL1_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('839', 'P001', 'D06_07_11', 'D34_10_11', 'R5_SR1_SL4_11', 'R5_SR1_SL1_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('840', 'P001', 'D06_07_12', 'D34_10_12', 'R5_SR1_SL4_12', 'R5_SR1_SL1_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('841', 'P001', 'D06_07_13', 'D34_10_13', 'R5_SR1_SL4_13', 'R5_SR1_SL1_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('842', 'P001', 'D06_07_14', 'D34_10_14', 'R5_SR1_SL4_14', 'R5_SR1_SL1_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('843', 'P001', 'D06_07_15', 'D34_10_15', 'R5_SR1_SL4_15', 'R5_SR1_SL1_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('844', 'P001', 'D06_07_16', 'D34_10_16', 'R5_SR1_SL4_16', 'R5_SR1_SL1_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('845', 'P001', 'D06_07_17', 'D34_10_17', 'R5_SR1_SL4_17', 'R5_SR1_SL1_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('846', 'P001', 'D06_07_18', 'D34_10_18', 'R5_SR1_SL4_18', 'R5_SR1_SL1_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('847', 'P001', 'D06_07_19', 'D34_10_19', 'R5_SR1_SL4_19', 'R5_SR1_SL1_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('848', 'P001', 'D06_07_20', 'D34_10_20', 'R5_SR1_SL4_20', 'R5_SR1_SL1_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('849', 'P001', 'D06_07_21', 'D34_10_21', 'R5_SR1_SL4_21', 'R5_SR1_SL1_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('850', 'P001', 'D06_08_01', 'D34_11_01', 'R5_SR1_SL11_1', 'R5_SR1_SL2_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('851', 'P001', 'D06_08_02', 'D34_11_02', 'R5_SR1_SL11_2', 'R5_SR1_SL2_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('852', 'P001', 'D06_08_03', 'D34_11_03', 'R5_SR1_SL11_3', 'R5_SR1_SL2_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('853', 'P001', 'D06_08_04', 'D34_11_04', 'R5_SR1_SL11_4', 'R5_SR1_SL2_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('854', 'P001', 'D06_08_05', 'D34_11_05', 'R5_SR1_SL11_5', 'R5_SR1_SL2_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('855', 'P001', 'D06_08_06', 'D34_11_06', 'R5_SR1_SL11_6', 'R5_SR1_SL2_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('856', 'P001', 'D06_08_07', 'D34_11_07', 'R5_SR1_SL11_7', 'R5_SR1_SL2_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('857', 'P001', 'D06_08_08', 'D34_11_08', 'R5_SR1_SL11_8', 'R5_SR1_SL2_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('858', 'P001', 'D06_08_09', 'D34_11_09', 'R5_SR1_SL11_9', 'R5_SR1_SL2_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('859', 'P001', 'D06_08_10', 'D34_11_10', 'R5_SR1_SL11_10', 'R5_SR1_SL2_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('860', 'P001', 'D06_08_11', 'D34_11_11', 'R5_SR1_SL11_11', 'R5_SR1_SL2_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('861', 'P001', 'D06_08_12', 'D34_11_12', 'R5_SR1_SL11_12', 'R5_SR1_SL2_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('862', 'P001', 'D06_08_13', 'D34_11_13', 'R5_SR1_SL11_13', 'R5_SR1_SL2_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('863', 'P001', 'D06_08_14', 'D34_11_14', 'R5_SR1_SL11_14', 'R5_SR1_SL2_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('864', 'P001', 'D06_08_15', 'D34_11_15', 'R5_SR1_SL11_15', 'R5_SR1_SL2_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('865', 'P001', 'D06_08_16', 'D34_11_16', 'R5_SR1_SL11_16', 'R5_SR1_SL2_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('866', 'P001', 'D06_08_17', 'D34_11_17', 'R5_SR1_SL11_17', 'R5_SR1_SL2_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('867', 'P001', 'D06_08_18', 'D34_11_18', 'R5_SR1_SL11_18', 'R5_SR1_SL2_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('868', 'P001', 'D06_08_19', 'D34_11_19', 'R5_SR1_SL11_19', 'R5_SR1_SL2_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('869', 'P001', 'D06_08_20', 'D34_11_20', 'R5_SR1_SL11_20', 'R5_SR1_SL2_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('870', 'P001', 'D06_08_21', 'D34_11_21', 'R5_SR1_SL11_21', 'R5_SR1_SL2_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('871', 'P001', 'D06_09_01', 'D33_01_01', 'R5_SR1_SL12_1', 'R5_SR1_SL3_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('872', 'P001', 'D06_09_02', 'D33_01_02', 'R5_SR1_SL12_2', 'R5_SR1_SL3_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('873', 'P001', 'D06_09_03', 'D33_01_03', 'R5_SR1_SL12_3', 'R5_SR1_SL3_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('874', 'P001', 'D06_09_04', 'D33_01_04', 'R5_SR1_SL12_4', 'R5_SR1_SL3_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('875', 'P001', 'D06_09_05', 'D33_01_05', 'R5_SR1_SL12_5', 'R5_SR1_SL3_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('876', 'P001', 'D06_09_06', 'D33_01_06', 'R5_SR1_SL12_6', 'R5_SR1_SL3_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('877', 'P001', 'D06_09_07', 'D33_01_07', 'R5_SR1_SL12_7', 'R5_SR1_SL3_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('878', 'P001', 'D06_09_08', 'D33_01_08', 'R5_SR1_SL12_8', 'R5_SR1_SL3_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('879', 'P001', 'D06_09_09', 'D33_01_09', 'R5_SR1_SL12_9', 'R5_SR1_SL3_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('880', 'P001', 'D06_09_10', 'D33_01_10', 'R5_SR1_SL12_10', 'R5_SR1_SL3_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('881', 'P001', 'D06_09_11', 'D33_01_11', 'R5_SR1_SL12_11', 'R5_SR1_SL3_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('882', 'P001', 'D06_09_12', 'D33_01_12', 'R5_SR1_SL12_12', 'R5_SR1_SL3_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('883', 'P001', 'D06_09_13', 'D33_01_13', 'R5_SR1_SL12_13', 'R5_SR1_SL3_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('884', 'P001', 'D06_09_14', 'D33_01_14', 'R5_SR1_SL12_14', 'R5_SR1_SL3_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('885', 'P001', 'D06_09_15', 'D33_01_15', 'R5_SR1_SL12_15', 'R5_SR1_SL3_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('886', 'P001', 'D06_09_16', 'D33_01_16', 'R5_SR1_SL12_16', 'R5_SR1_SL3_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('887', 'P001', 'D06_09_17', 'D33_01_17', 'R5_SR1_SL12_17', 'R5_SR1_SL3_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('888', 'P001', 'D06_09_18', 'D33_01_18', 'R5_SR1_SL12_18', 'R5_SR1_SL3_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('889', 'P001', 'D06_09_19', 'D33_01_19', 'R5_SR1_SL12_19', 'R5_SR1_SL3_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('890', 'P001', 'D06_09_20', 'D33_01_20', 'R5_SR1_SL12_20', 'R5_SR1_SL3_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('891', 'P001', 'D06_09_21', 'D33_01_21', 'R5_SR1_SL12_21', 'R5_SR1_SL3_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('892', 'P001', 'D06_10_01', 'D33_02_01', 'R5_SR1_SL13_1', 'R5_SR1_SL4_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('893', 'P001', 'D06_10_02', 'D33_02_02', 'R5_SR1_SL13_2', 'R5_SR1_SL4_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('894', 'P001', 'D06_10_03', 'D33_02_03', 'R5_SR1_SL13_3', 'R5_SR1_SL4_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('895', 'P001', 'D06_10_04', 'D33_02_04', 'R5_SR1_SL13_4', 'R5_SR1_SL4_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('896', 'P001', 'D06_10_05', 'D33_02_05', 'R5_SR1_SL13_5', 'R5_SR1_SL4_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('897', 'P001', 'D06_10_06', 'D33_02_06', 'R5_SR1_SL13_6', 'R5_SR1_SL4_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('898', 'P001', 'D06_10_07', 'D33_02_07', 'R5_SR1_SL13_7', 'R5_SR1_SL4_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('899', 'P001', 'D06_10_08', 'D33_02_08', 'R5_SR1_SL13_8', 'R5_SR1_SL4_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('900', 'P001', 'D06_10_09', 'D33_02_09', 'R5_SR1_SL13_9', 'R5_SR1_SL4_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('901', 'P001', 'D06_10_10', 'D33_02_10', 'R5_SR1_SL13_10', 'R5_SR1_SL4_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('902', 'P001', 'D06_10_11', 'D33_02_11', 'R5_SR1_SL13_11', 'R5_SR1_SL4_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('903', 'P001', 'D06_10_12', 'D33_02_12', 'R5_SR1_SL13_12', 'R5_SR1_SL4_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('904', 'P001', 'D06_10_13', 'D33_02_13', 'R5_SR1_SL13_13', 'R5_SR1_SL4_13', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('905', 'P001', 'D06_10_14', 'D33_02_14', 'R5_SR1_SL13_14', 'R5_SR1_SL4_14', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('906', 'P001', 'D06_10_15', 'D33_02_15', 'R5_SR1_SL13_15', 'R5_SR1_SL4_15', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('907', 'P001', 'D06_10_16', 'D33_02_16', 'R5_SR1_SL13_16', 'R5_SR1_SL4_16', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('908', 'P001', 'D06_10_17', 'D33_02_17', 'R5_SR1_SL13_17', 'R5_SR1_SL4_17', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('909', 'P001', 'D06_10_18', 'D33_02_18', 'R5_SR1_SL13_18', 'R5_SR1_SL4_18', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('910', 'P001', 'D06_10_19', 'D33_02_19', 'R5_SR1_SL13_19', 'R5_SR1_SL4_19', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('911', 'P001', 'D06_10_20', 'D33_02_20', 'R5_SR1_SL13_20', 'R5_SR1_SL4_20', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('912', 'P001', 'D06_10_21', 'D33_02_21', 'R5_SR1_SL13_21', 'R5_SR1_SL4_21', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('913', 'P001', 'D06_11_01', 'D33_03_01', 'R5_SR1_SL14_1', 'R5_SR1_SL11_1', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('914', 'P001', 'D06_11_02', 'D33_03_02', 'R5_SR1_SL14_2', 'R5_SR1_SL11_2', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('915', 'P001', 'D06_11_03', 'D33_03_03', 'R5_SR1_SL14_3', 'R5_SR1_SL11_3', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('916', 'P001', 'D06_11_04', 'D33_03_04', 'R5_SR1_SL14_4', 'R5_SR1_SL11_4', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('917', 'P001', 'D06_11_05', 'D33_03_05', 'R5_SR1_SL14_5', 'R5_SR1_SL11_5', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('918', 'P001', 'D06_11_06', 'D33_03_06', 'R5_SR1_SL14_6', 'R5_SR1_SL11_6', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('919', 'P001', 'D06_11_07', 'D33_03_07', 'R5_SR1_SL14_7', 'R5_SR1_SL11_7', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('920', 'P001', 'D06_11_08', 'D33_03_08', 'R5_SR1_SL14_8', 'R5_SR1_SL11_8', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('921', 'P001', 'D06_11_09', 'D33_03_09', 'R5_SR1_SL14_9', 'R5_SR1_SL11_9', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('922', 'P001', 'D06_11_10', 'D33_03_10', 'R5_SR1_SL14_10', 'R5_SR1_SL11_10', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('923', 'P001', 'D06_11_11', 'D33_03_11', 'R5_SR1_SL14_11', 'R5_SR1_SL11_11', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('924', 'P001', 'D06_11_12', 'D33_03_12', 'R5_SR1_SL14_12', 'R5_SR1_SL11_12', '1');
INSERT INTO `tb_perangkat_detail` VALUES ('925', 'P001', 'D06_11_13', 'D33_03_13', 'R5_SR1_SL14_13', 'R5_SR1_SL11_13', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=725 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_sirkit
-- ----------------------------
INSERT INTO `tb_sirkit` VALUES ('1', '232', 'rusak', '21', '19', '1', '', '', '', '', '', '', '1-18-2', '', '', '2014-02-04 18:45:13');
INSERT INTO `tb_sirkit` VALUES ('2', '233', 'rusak', '21', '19', '1', '', '', '', '', '', '', '1-31-2', '', '', '2014-02-04 18:45:14');
INSERT INTO `tb_sirkit` VALUES ('3', '234', 'rusak', '21', '19', '1', '', '', '', '', '', '30N24', '1-31-3', '', '', '2014-02-04 18:45:14');
INSERT INTO `tb_sirkit` VALUES ('4', '235', 'rusak', '21', '19', '1', '', '', '', '', '', '', '1-32-3', '', '', '2014-02-04 18:45:14');
INSERT INTO `tb_sirkit` VALUES ('5', '236', 'rusak', '21', '19', '1', '', '', '', '', '', '', '1-37-2', '', '', '2014-02-04 18:45:14');
INSERT INTO `tb_sirkit` VALUES ('6', '237', 'rusak', '21', '19', '1', '', '', '', '', '', '', '1-37-1', '', '', '2014-02-04 18:45:14');
INSERT INTO `tb_sirkit` VALUES ('7', '238', 'rusak', '21', '19', '1', '', '', '', '', '', '', '1-39-3', '', '', '2014-02-04 18:45:14');
INSERT INTO `tb_sirkit` VALUES ('8', '239', 'rusak', '21', '19', '1', '', '', '', '', '', '', '1-42-1', '', '', '2014-02-04 18:45:14');
INSERT INTO `tb_sirkit` VALUES ('9', '240', 'rusak', '21', '19', '1', '', '', '', '', '', '', '1-45-2', '', '', '2014-02-04 18:45:14');
INSERT INTO `tb_sirkit` VALUES ('10', '241', 'rusak', '21', '19', '1', '', '', '', '', '', '', '1-45-3', '', '', '2014-02-04 18:45:14');
INSERT INTO `tb_sirkit` VALUES ('11', '242', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:14');
INSERT INTO `tb_sirkit` VALUES ('12', '243', 'rusak', '23', '21', '2', '', '', 'ZTE', 'E05_07_05', '', '', '', '', '', '2014-02-04 18:45:14');
INSERT INTO `tb_sirkit` VALUES ('13', '244', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:14');
INSERT INTO `tb_sirkit` VALUES ('14', '245', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:15');
INSERT INTO `tb_sirkit` VALUES ('15', '246', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:15');
INSERT INTO `tb_sirkit` VALUES ('16', '247', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:15');
INSERT INTO `tb_sirkit` VALUES ('17', '248', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:15');
INSERT INTO `tb_sirkit` VALUES ('18', '249', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:15');
INSERT INTO `tb_sirkit` VALUES ('19', '250', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:15');
INSERT INTO `tb_sirkit` VALUES ('20', '251', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:15');
INSERT INTO `tb_sirkit` VALUES ('21', '252', 'rusak', '36', '21', '3', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:15');
INSERT INTO `tb_sirkit` VALUES ('22', '253', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:15');
INSERT INTO `tb_sirkit` VALUES ('23', '254', 'rusak', '21', '23', '1', '', '', '', '', '', ' INT SGI', '3-59-1', '', '', '2014-02-04 18:45:15');
INSERT INTO `tb_sirkit` VALUES ('24', '255', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:15');
INSERT INTO `tb_sirkit` VALUES ('25', '256', 'rusak', '21', '19', '1', '', '', '', '', '', '', '5-29-1', '', '', '2014-02-04 18:45:15');
INSERT INTO `tb_sirkit` VALUES ('26', '257', 'rusak', '21', '28', '1', '', '', '', '', '', 'SLI', '6-51-3', '', '', '2014-02-04 18:45:16');
INSERT INTO `tb_sirkit` VALUES ('27', '258', 'rusak', '21', '19', '1', '', '', '', '', '', 'HOT BILLING 007', '2-22-0', '', '', '2014-02-04 18:45:16');
INSERT INTO `tb_sirkit` VALUES ('28', '259', 'rusak', '21', '19', '1', '', '', '', '', '', 'HOT BILLING 007', '2-39-2', '', '', '2014-02-04 18:45:16');
INSERT INTO `tb_sirkit` VALUES ('29', '260', 'rusak', '21', '23', '1', '', '', '', '', '', 'TE_TE', '3-54-1', '', '', '2014-02-04 18:45:16');
INSERT INTO `tb_sirkit` VALUES ('30', '261', 'rusak', '21', '23', '1', '', '', '', '', '', 'TE_TE', '3-55-1', '', '', '2014-02-04 18:45:16');
INSERT INTO `tb_sirkit` VALUES ('31', '262', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:16');
INSERT INTO `tb_sirkit` VALUES ('32', '263', 'rusak', '21', '19', '1', '', '', 'LAST MILE_58', 'D09_08_16', '', '', '', '', 'PT Sekar Makmur', '2014-02-04 18:45:16');
INSERT INTO `tb_sirkit` VALUES ('33', '264', 'rusak', '21', '29', '1', '', '', 'VIA JKT2-BTM', '', '', 'SLI', '6-50-2', '', '', '2014-02-04 18:45:16');
INSERT INTO `tb_sirkit` VALUES ('34', '265', 'rusak', '21', '29', '1', '', '', 'VIA JKT2-BTM', '', '', 'SLI', '6-51-2', '', '', '2014-02-04 18:45:16');
INSERT INTO `tb_sirkit` VALUES ('35', '266', 'rusak', '21', '29', '1', '', '', '', '', '', '', '6-49-2', '', '', '2014-02-04 18:45:16');
INSERT INTO `tb_sirkit` VALUES ('36', '267', 'rusak', '6', '21', '3', '', '', '', '', '5M01_02_07', '', '', '', ' ORANGE TJ SADARI', '2014-02-04 18:45:16');
INSERT INTO `tb_sirkit` VALUES ('37', '268', 'rusak', '21', '23', '1', '', '', '', '', '', ' INT SGI', '3-60-1', '', '', '2014-02-04 18:45:16');
INSERT INTO `tb_sirkit` VALUES ('38', '269', 'rusak', '21', '23', '1', '', '', '', '', '', ' INT SGI', '3-61-1', '', '', '2014-02-04 18:45:16');
INSERT INTO `tb_sirkit` VALUES ('39', '270', 'rusak', '21', '23', '1', '', '', '', '', '', ' INT SGI', '3-62-1', '', '', '2014-02-04 18:45:17');
INSERT INTO `tb_sirkit` VALUES ('40', '271', 'rusak', '21', '23', '1', '', '', '', '', '', ' INT SGI', '3-63-1', '', '', '2014-02-04 18:45:17');
INSERT INTO `tb_sirkit` VALUES ('41', '272', 'rusak', '21', '23', '1', '', '', '', '', '', ' INT SGI', '6-44-1', '', '', '2014-02-04 18:45:17');
INSERT INTO `tb_sirkit` VALUES ('42', '273', 'rusak', '21', '18', '3', '', '', '', '', '5M01_12_01', '5254', '', '', 'IMUX SINGTEL', '2014-02-04 18:45:17');
INSERT INTO `tb_sirkit` VALUES ('43', '274', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:17');
INSERT INTO `tb_sirkit` VALUES ('44', '275', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:17');
INSERT INTO `tb_sirkit` VALUES ('45', '276', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:17');
INSERT INTO `tb_sirkit` VALUES ('46', '277', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:17');
INSERT INTO `tb_sirkit` VALUES ('47', '278', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:17');
INSERT INTO `tb_sirkit` VALUES ('48', '279', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:17');
INSERT INTO `tb_sirkit` VALUES ('49', '280', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:17');
INSERT INTO `tb_sirkit` VALUES ('50', '281', 'rusak', '6', '21', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:17');
INSERT INTO `tb_sirkit` VALUES ('51', '282', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:17');
INSERT INTO `tb_sirkit` VALUES ('52', '283', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:17');
INSERT INTO `tb_sirkit` VALUES ('53', '284', 'rusak', '21', '23', '1', '', '', '', '', '', ' INT SGI', '6-45-3', '', '', '2014-02-04 18:45:18');
INSERT INTO `tb_sirkit` VALUES ('54', '285', 'rusak', '21', '23', '1', '', '', '', '', '', ' INT SGI', '6-46-1', '', '', '2014-02-04 18:45:18');
INSERT INTO `tb_sirkit` VALUES ('55', '286', 'rusak', '6', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:18');
INSERT INTO `tb_sirkit` VALUES ('56', '287', 'rusak', '6', '9', '1', '', '', '', '', 'u1/5', '', '', '', 'DEAKTIVASI', '2014-02-04 18:45:18');
INSERT INTO `tb_sirkit` VALUES ('57', '288', 'rusak', '23', '19', '4', '', '', 'B09_03_09', '', '', '', '', '', '', '2014-02-04 18:45:18');
INSERT INTO `tb_sirkit` VALUES ('58', '289', 'rusak', '6', '30', '5', '', '', '', 'S6_1', 'C04_06_01', '', '', '', '', '2014-02-04 18:45:18');
INSERT INTO `tb_sirkit` VALUES ('59', '290', 'rusak', '6', '30', '5', '', '', '', 'S6_2', 'C04_06_02', '', '', '', '', '2014-02-04 18:45:18');
INSERT INTO `tb_sirkit` VALUES ('60', '291', 'rusak', '6', '19', '6', '', '', '', 'C05_11_13', 'CSM 1-15', '', '', '', '', '2014-02-04 18:45:18');
INSERT INTO `tb_sirkit` VALUES ('61', '292', 'rusak', '6', '31', '1', '', '', '', '', 'B06_03_24', 'AMERIKA', '', '', '', '2014-02-04 18:45:18');
INSERT INTO `tb_sirkit` VALUES ('62', '293', 'rusak', '6', '16', '5', '', '', '', '', 'S6_3', '', '', '', '', '2014-02-04 18:45:18');
INSERT INTO `tb_sirkit` VALUES ('63', '294', 'rusak', '6', '16', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:18');
INSERT INTO `tb_sirkit` VALUES ('64', '295', 'rusak', '34', '9', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:19');
INSERT INTO `tb_sirkit` VALUES ('65', '296', 'rusak', '6', '30', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:19');
INSERT INTO `tb_sirkit` VALUES ('66', '297', 'rusak', '21', '23', '1', '', '', '', '', '', ' INT SGI', '6-47-1', '', '', '2014-02-04 18:45:19');
INSERT INTO `tb_sirkit` VALUES ('67', '298', 'rusak', '21', '23', '1', '', '', '', '', '', ' INT SGI', '6-48-1', '', '', '2014-02-04 18:45:19');
INSERT INTO `tb_sirkit` VALUES ('68', '299', 'rusak', '6', '9', '1', '', '', '', '', 'T11_16', '', '', '', '', '2014-02-04 18:45:19');
INSERT INTO `tb_sirkit` VALUES ('69', '300', 'rusak', '6', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:19');
INSERT INTO `tb_sirkit` VALUES ('70', '301', 'rusak', '17', '19', '7', '', '', 'MR 23_10_06', 'F02_10_06', '', '', '', '', '', '2014-02-04 18:45:19');
INSERT INTO `tb_sirkit` VALUES ('71', '302', 'rusak', '6', '19', '3', '', '', '', '', '5M01_06_12', '3593', '', '', '', '2014-02-04 18:45:19');
INSERT INTO `tb_sirkit` VALUES ('72', '303', 'rusak', '6', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:19');
INSERT INTO `tb_sirkit` VALUES ('73', '304', 'rusak', '6', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:19');
INSERT INTO `tb_sirkit` VALUES ('74', '305', 'rusak', '6', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:19');
INSERT INTO `tb_sirkit` VALUES ('75', '306', 'rusak', '6', '10', '1', '', '', '', '', 'G7/19', '', '', '', '', '2014-02-04 18:45:19');
INSERT INTO `tb_sirkit` VALUES ('76', '307', 'rusak', '6', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:19');
INSERT INTO `tb_sirkit` VALUES ('77', '308', 'rusak', '14', '23', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:19');
INSERT INTO `tb_sirkit` VALUES ('78', '309', 'rusak', '14', '23', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:20');
INSERT INTO `tb_sirkit` VALUES ('79', '310', 'rusak', '6', '16', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:20');
INSERT INTO `tb_sirkit` VALUES ('80', '311', 'rusak', '6', '16', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:20');
INSERT INTO `tb_sirkit` VALUES ('81', '312', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:20');
INSERT INTO `tb_sirkit` VALUES ('82', '313', 'rusak', '26', '16', '8', '', '', 'NE52_2_5', '', '', '', '', '', '', '2014-02-04 18:45:20');
INSERT INTO `tb_sirkit` VALUES ('83', '314', 'rusak', '23', '19', '1', '', '', 'NE36_2_8', '', '', '', '', '', '', '2014-02-04 18:45:20');
INSERT INTO `tb_sirkit` VALUES ('84', '315', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:20');
INSERT INTO `tb_sirkit` VALUES ('85', '316', 'rusak', '14', '32', '9', '', '', '', '', '', '30N24', '6-49-3', '', '', '2014-02-04 18:45:20');
INSERT INTO `tb_sirkit` VALUES ('86', '317', 'rusak', '14', '32', '9', '', '', '', '', '', '30N25', '6-50-3', '', '', '2014-02-04 18:45:20');
INSERT INTO `tb_sirkit` VALUES ('87', '318', 'rusak', '18', '19', '5', '', '', ' ALC6_02_02', '', '', '', '', '', '', '2014-02-04 18:45:20');
INSERT INTO `tb_sirkit` VALUES ('88', '319', 'rusak', '18', '19', '1', '', '', ' ALC6_02_03', '', '', '', '', '', '', '2014-02-04 18:45:20');
INSERT INTO `tb_sirkit` VALUES ('89', '320', 'rusak', '18', '19', '5', '', '', ' ALC6_02_04', '', '', '', '', '', '', '2014-02-04 18:45:20');
INSERT INTO `tb_sirkit` VALUES ('90', '321', 'rusak', '18', '19', '5', '', '', ' ALC6_02_05', '', '', '', '', '', '', '2014-02-04 18:45:21');
INSERT INTO `tb_sirkit` VALUES ('91', '322', 'rusak', '18', '19', '1', '', '', ' ALC6_02_06', '', '', '', '', '', '', '2014-02-04 18:45:21');
INSERT INTO `tb_sirkit` VALUES ('92', '323', 'rusak', '18', '19', '5', '', '', ' ALC6_02_07', '', '', '', '', '', '', '2014-02-04 18:45:21');
INSERT INTO `tb_sirkit` VALUES ('93', '324', 'rusak', '18', '19', '1', '', '', ' ALC6_02_08', '', '', '', '', '', '', '2014-02-04 18:45:21');
INSERT INTO `tb_sirkit` VALUES ('94', '325', 'rusak', '18', '19', '1', '', '', ' ALC6_02_09', '', '', '', '', '', '', '2014-02-04 18:45:21');
INSERT INTO `tb_sirkit` VALUES ('95', '326', 'rusak', '18', '19', '1', '', '', ' ALC6_02_10', '', '', '', '', '', '', '2014-02-04 18:45:21');
INSERT INTO `tb_sirkit` VALUES ('96', '327', 'rusak', '2', '19', '1', '', '', 'R2_SR2_SL1_01', 'J03_04_01', '', '', '', '', '', '2014-02-04 18:45:21');
INSERT INTO `tb_sirkit` VALUES ('97', '328', 'rusak', '2', '19', '10', '', '', 'R2_SR2_SL1_02', 'J03_04_02', '', '', '', '', '', '2014-02-04 18:45:21');
INSERT INTO `tb_sirkit` VALUES ('98', '329', 'rusak', '2', '19', '10', '', '', 'R2_SR2_SL1_03', 'J03_04_03', '', '', '', '', '', '2014-02-04 18:45:21');
INSERT INTO `tb_sirkit` VALUES ('99', '330', 'rusak', '2', '19', '10', '', '', 'R2_SR2_SL1_04', 'J03_04_04', '', '', '', '', '', '2014-02-04 18:45:21');
INSERT INTO `tb_sirkit` VALUES ('100', '331', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:21');
INSERT INTO `tb_sirkit` VALUES ('101', '332', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:21');
INSERT INTO `tb_sirkit` VALUES ('102', '333', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:21');
INSERT INTO `tb_sirkit` VALUES ('103', '334', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:22');
INSERT INTO `tb_sirkit` VALUES ('104', '335', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:22');
INSERT INTO `tb_sirkit` VALUES ('105', '336', 'rusak', '23', '19', '1', '', '', 'ALC 3_01_14', '', '', '', '', '', '', '2014-02-04 18:45:22');
INSERT INTO `tb_sirkit` VALUES ('106', '337', 'rusak', '21', '19', '1', '', '', '', '', '', 'VOIP 7-5', '', '', '', '2014-02-04 18:45:22');
INSERT INTO `tb_sirkit` VALUES ('107', '338', 'rusak', '14', '33', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:22');
INSERT INTO `tb_sirkit` VALUES ('108', '339', 'rusak', '14', '33', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:22');
INSERT INTO `tb_sirkit` VALUES ('109', '340', 'rusak', '14', '33', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:22');
INSERT INTO `tb_sirkit` VALUES ('110', '341', 'rusak', '14', '33', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:22');
INSERT INTO `tb_sirkit` VALUES ('111', '342', 'rusak', '21', '34', '1', '', '', '', '', '', '', '6-51-1', '', '', '2014-02-04 18:45:22');
INSERT INTO `tb_sirkit` VALUES ('112', '343', 'rusak', '21', '34', '1', '', '', '', '', '', '', '6-50-1', '', '', '2014-02-04 18:45:22');
INSERT INTO `tb_sirkit` VALUES ('113', '344', 'rusak', '21', '35', '1', '', '', '', '', '', '', '6-50-0', '', '', '2014-02-04 18:45:22');
INSERT INTO `tb_sirkit` VALUES ('114', '345', 'rusak', '21', '16', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:22');
INSERT INTO `tb_sirkit` VALUES ('115', '346', 'rusak', '21', '16', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:22');
INSERT INTO `tb_sirkit` VALUES ('116', '347', 'rusak', '21', '16', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:22');
INSERT INTO `tb_sirkit` VALUES ('117', '348', 'rusak', '21', '16', '1', '', '', '', 'T6/24', 'C03_06-24', '', '', '', '', '2014-02-04 18:45:23');
INSERT INTO `tb_sirkit` VALUES ('118', '349', 'rusak', '21', '16', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:23');
INSERT INTO `tb_sirkit` VALUES ('119', '350', 'rusak', '21', '16', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:23');
INSERT INTO `tb_sirkit` VALUES ('120', '351', 'rusak', '21', '16', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:23');
INSERT INTO `tb_sirkit` VALUES ('121', '352', 'rusak', '14', '33', '1', '', '', '', '', '', '', '0_04_3', '', 'TRAF SLI017', '2014-02-04 18:45:23');
INSERT INTO `tb_sirkit` VALUES ('122', '353', 'rusak', '21', '16', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:23');
INSERT INTO `tb_sirkit` VALUES ('123', '354', 'rusak', '21', '16', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:23');
INSERT INTO `tb_sirkit` VALUES ('124', '355', 'rusak', '21', '16', '5', '', '', '', 'T7/1', 'C03_07_01', '', '', '', '', '2014-02-04 18:45:23');
INSERT INTO `tb_sirkit` VALUES ('125', '356', 'rusak', '21', '16', '5', '', '', '', '', 'T7/3', '', '', '', '', '2014-02-04 18:45:23');
INSERT INTO `tb_sirkit` VALUES ('126', '357', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:23');
INSERT INTO `tb_sirkit` VALUES ('127', '358', 'rusak', '21', '36', '1', '', '', '', 'SLI ', '', '', '6-59-3', '', '', '2014-02-04 18:45:23');
INSERT INTO `tb_sirkit` VALUES ('128', '359', 'rusak', '21', '36', '1', '', '', '', 'SLI ', '', '', '6-50-3', '', '', '2014-02-04 18:45:24');
INSERT INTO `tb_sirkit` VALUES ('129', '360', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:24');
INSERT INTO `tb_sirkit` VALUES ('130', '361', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:24');
INSERT INTO `tb_sirkit` VALUES ('131', '362', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:24');
INSERT INTO `tb_sirkit` VALUES ('132', '363', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:24');
INSERT INTO `tb_sirkit` VALUES ('133', '364', 'rusak', '14', '24', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:24');
INSERT INTO `tb_sirkit` VALUES ('134', '365', 'rusak', '14', '24', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:24');
INSERT INTO `tb_sirkit` VALUES ('135', '366', 'rusak', '14', '24', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:24');
INSERT INTO `tb_sirkit` VALUES ('136', '367', 'rusak', '14', '24', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:24');
INSERT INTO `tb_sirkit` VALUES ('137', '368', 'rusak', '14', '24', '1', '', '', '', '', '', '', '4-48-1', '', '', '2014-02-04 18:45:24');
INSERT INTO `tb_sirkit` VALUES ('138', '369', 'rusak', '14', '24', '1', '', '', '', '', '', '', '1-03-0', '', '', '2014-02-04 18:45:24');
INSERT INTO `tb_sirkit` VALUES ('139', '370', 'rusak', '14', '24', '1', '', '', '', '', '', '', '1-02-0', '', '', '2014-02-04 18:45:24');
INSERT INTO `tb_sirkit` VALUES ('140', '371', 'rusak', '14', '24', '1', '', '', '', '', '', '', '1-43-2', '', '', '2014-02-04 18:45:24');
INSERT INTO `tb_sirkit` VALUES ('141', '372', 'rusak', '14', '24', '1', '', '', '', '', '', '', '1-06-0', '', '', '2014-02-04 18:45:25');
INSERT INTO `tb_sirkit` VALUES ('142', '373', 'rusak', '14', '24', '1', '', '', '', '', '', '', '1-07-0', '', '', '2014-02-04 18:45:25');
INSERT INTO `tb_sirkit` VALUES ('143', '374', 'rusak', '14', '24', '1', '', '', '', '', '', '', '1-09-0', '', '', '2014-02-04 18:45:25');
INSERT INTO `tb_sirkit` VALUES ('144', '375', 'rusak', '14', '24', '1', '', '', '', '', '', '', '1-08-0', '', '', '2014-02-04 18:45:25');
INSERT INTO `tb_sirkit` VALUES ('145', '376', 'rusak', '14', '24', '1', '', '', '', '', '', '', '1-11-0', '', '', '2014-02-04 18:45:25');
INSERT INTO `tb_sirkit` VALUES ('146', '377', 'rusak', '14', '24', '1', '', '', '', '', '', '', '2-07-0', '', '', '2014-02-04 18:45:25');
INSERT INTO `tb_sirkit` VALUES ('147', '378', 'rusak', '14', '37', '1', '', '', '', '', '', '', '4-55-0', '', '', '2014-02-04 18:45:25');
INSERT INTO `tb_sirkit` VALUES ('148', '380', 'rusak', '14', '37', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:25');
INSERT INTO `tb_sirkit` VALUES ('149', '381', 'rusak', '14', '37', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:25');
INSERT INTO `tb_sirkit` VALUES ('150', '382', 'rusak', '14', '37', '1', '', '', '', '', '', '', '6-10-3', '', '', '2014-02-04 18:45:25');
INSERT INTO `tb_sirkit` VALUES ('151', '383', 'rusak', '14', '37', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:25');
INSERT INTO `tb_sirkit` VALUES ('152', '384', 'rusak', '14', '37', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:25');
INSERT INTO `tb_sirkit` VALUES ('153', '385', 'rusak', '14', '37', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:25');
INSERT INTO `tb_sirkit` VALUES ('154', '386', 'rusak', '14', '37', '1', '', '', '', '', '', '', '6-28-2', '', '', '2014-02-04 18:45:26');
INSERT INTO `tb_sirkit` VALUES ('155', '387', 'rusak', '14', '37', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:26');
INSERT INTO `tb_sirkit` VALUES ('156', '388', 'rusak', '14', '37', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:26');
INSERT INTO `tb_sirkit` VALUES ('157', '389', 'rusak', '14', '37', '1', '', '', '', '', '', '', '6-28-2', '', '', '2014-02-04 18:45:26');
INSERT INTO `tb_sirkit` VALUES ('158', '390', 'rusak', '14', '37', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:26');
INSERT INTO `tb_sirkit` VALUES ('159', '391', 'rusak', '14', '37', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:26');
INSERT INTO `tb_sirkit` VALUES ('160', '392', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:26');
INSERT INTO `tb_sirkit` VALUES ('161', '393', 'rusak', '21', '27', '1', '', '', '', '', '', ' SLI', '6-53-1', '', '', '2014-02-04 18:45:26');
INSERT INTO `tb_sirkit` VALUES ('162', '394', 'rusak', '21', '23', '1', '', '', 'TRA BTM  B10_06_01', '', '', 'INT SLI', '6-27-0', '', '', '2014-02-04 18:45:26');
INSERT INTO `tb_sirkit` VALUES ('163', '395', 'rusak', '21', '23', '1', '', '', '', '', '', 'INT SLI', '6-28-0', '', '', '2014-02-04 18:45:26');
INSERT INTO `tb_sirkit` VALUES ('164', '396', 'rusak', '21', '23', '1', '', '', '', '', '', 'INT SLI', '6-29-0', '', '', '2014-02-04 18:45:26');
INSERT INTO `tb_sirkit` VALUES ('165', '397', 'rusak', '21', '23', '1', '', '', '', '', '', 'INT SLI', '6-30-0', '', '', '2014-02-04 18:45:26');
INSERT INTO `tb_sirkit` VALUES ('166', '398', 'rusak', '21', '23', '1', '', '', '', '', '', 'INT SLI', '6-31-0', '', '', '2014-02-04 18:45:26');
INSERT INTO `tb_sirkit` VALUES ('167', '399', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:27');
INSERT INTO `tb_sirkit` VALUES ('168', '400', 'rusak', '17', '19', '3', '', '', 'OR 28_9_12', 'D13_09_12', '', '4665', '', '', '', '2014-02-04 18:45:27');
INSERT INTO `tb_sirkit` VALUES ('169', '401', 'rusak', '21', '25', '1', '', '', '', '', '', '', '5-13-2', '', '', '2014-02-04 18:45:27');
INSERT INTO `tb_sirkit` VALUES ('170', '402', 'rusak', '21', '25', '1', '', '', '', '', '', '', '5-24-0', '', '', '2014-02-04 18:45:27');
INSERT INTO `tb_sirkit` VALUES ('171', '404', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:27');
INSERT INTO `tb_sirkit` VALUES ('172', '405', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:27');
INSERT INTO `tb_sirkit` VALUES ('173', '406', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:27');
INSERT INTO `tb_sirkit` VALUES ('174', '407', 'rusak', '10', '38', '1', '', '', '', '', 'ADX STM100_24', '', '3-16-1', '', '', '2014-02-04 18:45:27');
INSERT INTO `tb_sirkit` VALUES ('175', '408', 'rusak', '21', '19', '10', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:27');
INSERT INTO `tb_sirkit` VALUES ('176', '409', 'rusak', '26', '19', '10', '', '', 'NE52_3_3', '', '', '', '', '', '', '2014-02-04 18:45:27');
INSERT INTO `tb_sirkit` VALUES ('177', '410', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:27');
INSERT INTO `tb_sirkit` VALUES ('178', '411', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:27');
INSERT INTO `tb_sirkit` VALUES ('179', '412', 'rusak', '26', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:27');
INSERT INTO `tb_sirkit` VALUES ('180', '413', 'rusak', '6', '9', '1', '', '', '', '', 'V2_5', '', '', '', '', '2014-02-04 18:45:28');
INSERT INTO `tb_sirkit` VALUES ('181', '414', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:28');
INSERT INTO `tb_sirkit` VALUES ('182', '415', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:28');
INSERT INTO `tb_sirkit` VALUES ('183', '416', 'rusak', '21', '19', '1', '', '', '', '', 'C01_06_13', '', '8_01_0', '', 'SB3T', '2014-02-04 18:45:28');
INSERT INTO `tb_sirkit` VALUES ('184', '417', 'rusak', '14', '19', '9', '', '', '', '', '', '', '8-01-0', '', 'NATRINDO', '2014-02-04 18:45:28');
INSERT INTO `tb_sirkit` VALUES ('185', '418', 'rusak', '14', '19', '9', '', '', '', '', '', '', '5-29-0', '', 'NATRINDO', '2014-02-04 18:45:28');
INSERT INTO `tb_sirkit` VALUES ('186', '419', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:28');
INSERT INTO `tb_sirkit` VALUES ('187', '420', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:28');
INSERT INTO `tb_sirkit` VALUES ('188', '421', 'rusak', '26', '19', '1', '', '', 'NE 53/2/17', 'A02_2_17', '', '', '', '', '', '2014-02-04 18:45:28');
INSERT INTO `tb_sirkit` VALUES ('189', '422', 'rusak', '15', '21', '11', '', '', 'ALCR2_3_17', 'D01_06_17', '', '', '', '', '', '2014-02-04 18:45:28');
INSERT INTO `tb_sirkit` VALUES ('190', '423', 'rusak', '15', '21', '11', '', '', 'ALCR2_3_18', 'D01_06_18', '', '', '', '', '', '2014-02-04 18:45:28');
INSERT INTO `tb_sirkit` VALUES ('191', '424', 'rusak', '26', '24', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:28');
INSERT INTO `tb_sirkit` VALUES ('192', '425', 'rusak', '26', '24', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:28');
INSERT INTO `tb_sirkit` VALUES ('193', '426', 'rusak', '26', '24', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:29');
INSERT INTO `tb_sirkit` VALUES ('194', '427', 'rusak', '26', '24', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:29');
INSERT INTO `tb_sirkit` VALUES ('195', '428', 'rusak', '21', '23', '1', '', '', '', '', '', '', '4-46-3', '', '', '2014-02-04 18:45:29');
INSERT INTO `tb_sirkit` VALUES ('196', '429', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:29');
INSERT INTO `tb_sirkit` VALUES ('197', '430', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:29');
INSERT INTO `tb_sirkit` VALUES ('198', '431', 'rusak', '21', '23', '1', '', '', '', '', '', '', '2-44-3', '', '', '2014-02-04 18:45:29');
INSERT INTO `tb_sirkit` VALUES ('199', '432', 'rusak', '21', '23', '1', '', '', '', '', '', '', '2-46-3', '', '', '2014-02-04 18:45:29');
INSERT INTO `tb_sirkit` VALUES ('200', '433', 'rusak', '18', '21', '5', '', '', 'ALCR5_1_21', 'D02_05_21', '', '', '', '', '', '2014-02-04 18:45:29');
INSERT INTO `tb_sirkit` VALUES ('201', '434', 'rusak', '21', '19', '1', '', '', '', '', '', '', '0-40-3', '', '', '2014-02-04 18:45:29');
INSERT INTO `tb_sirkit` VALUES ('202', '435', 'rusak', '21', '19', '1', '', '', '', '', '', '', '0-54-1', '', '', '2014-02-04 18:45:29');
INSERT INTO `tb_sirkit` VALUES ('203', '436', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', 'YES TV', '2014-02-04 18:45:29');
INSERT INTO `tb_sirkit` VALUES ('204', '437', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:29');
INSERT INTO `tb_sirkit` VALUES ('205', '438', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:29');
INSERT INTO `tb_sirkit` VALUES ('206', '439', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:29');
INSERT INTO `tb_sirkit` VALUES ('207', '440', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:30');
INSERT INTO `tb_sirkit` VALUES ('208', '441', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:30');
INSERT INTO `tb_sirkit` VALUES ('209', '442', 'rusak', '17', '21', '3', '', '', 'MR 25_6_8', 'F04_06_08', '', '4881', '', '', 'IMUX 50722/12/1-12', '2014-02-04 18:45:30');
INSERT INTO `tb_sirkit` VALUES ('210', '443', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:30');
INSERT INTO `tb_sirkit` VALUES ('211', '444', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:30');
INSERT INTO `tb_sirkit` VALUES ('212', '445', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:30');
INSERT INTO `tb_sirkit` VALUES ('213', '446', 'rusak', '17', '9', '3', '', '', 'MR 25_6_10', 'F04_06_10', '', '', '', '', 'IMUX 50722/12/2-13', '2014-02-04 18:45:30');
INSERT INTO `tb_sirkit` VALUES ('214', '447', 'rusak', '32', '9', '3', '', '', 'RL 35_05_14', 'D11_05_14', '', '4882', '', '', '', '2014-02-04 18:45:30');
INSERT INTO `tb_sirkit` VALUES ('215', '448', 'rusak', '37', '21', '3', '', '', '0R31_6_21', 'D16_06_21', '', '', '', '', '', '2014-02-04 18:45:30');
INSERT INTO `tb_sirkit` VALUES ('216', '449', 'rusak', '21', '19', '3', '', '', '', '', 'J07_07_06', '551', '', '', '', '2014-02-04 18:45:30');
INSERT INTO `tb_sirkit` VALUES ('217', '450', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:30');
INSERT INTO `tb_sirkit` VALUES ('218', '451', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:30');
INSERT INTO `tb_sirkit` VALUES ('219', '452', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:30');
INSERT INTO `tb_sirkit` VALUES ('220', '453', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:30');
INSERT INTO `tb_sirkit` VALUES ('221', '454', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:31');
INSERT INTO `tb_sirkit` VALUES ('222', '455', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:31');
INSERT INTO `tb_sirkit` VALUES ('223', '456', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:31');
INSERT INTO `tb_sirkit` VALUES ('224', '457', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:31');
INSERT INTO `tb_sirkit` VALUES ('225', '458', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:31');
INSERT INTO `tb_sirkit` VALUES ('226', '459', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:31');
INSERT INTO `tb_sirkit` VALUES ('227', '460', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:31');
INSERT INTO `tb_sirkit` VALUES ('228', '461', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:31');
INSERT INTO `tb_sirkit` VALUES ('229', '462', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:31');
INSERT INTO `tb_sirkit` VALUES ('230', '463', 'rusak', '21', '16', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:31');
INSERT INTO `tb_sirkit` VALUES ('231', '464', 'rusak', '21', '16', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:31');
INSERT INTO `tb_sirkit` VALUES ('232', '465', 'rusak', '10', '17', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:31');
INSERT INTO `tb_sirkit` VALUES ('233', '466', 'rusak', '21', '16', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:32');
INSERT INTO `tb_sirkit` VALUES ('234', '467', 'rusak', '21', '16', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:32');
INSERT INTO `tb_sirkit` VALUES ('235', '468', 'rusak', '21', '18', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:32');
INSERT INTO `tb_sirkit` VALUES ('236', '469', 'rusak', '21', '18', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:32');
INSERT INTO `tb_sirkit` VALUES ('237', '470', 'rusak', '19', '19', '9', '', '', '', '', 'G03_09_18', 'SSW', '22_1_3', '', 'PRA ISDN', '2014-02-04 18:45:32');
INSERT INTO `tb_sirkit` VALUES ('238', '471', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:32');
INSERT INTO `tb_sirkit` VALUES ('239', '472', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:32');
INSERT INTO `tb_sirkit` VALUES ('240', '473', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:32');
INSERT INTO `tb_sirkit` VALUES ('241', '474', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:32');
INSERT INTO `tb_sirkit` VALUES ('242', '475', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:32');
INSERT INTO `tb_sirkit` VALUES ('243', '476', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:32');
INSERT INTO `tb_sirkit` VALUES ('244', '477', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:32');
INSERT INTO `tb_sirkit` VALUES ('245', '478', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:32');
INSERT INTO `tb_sirkit` VALUES ('246', '479', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:32');
INSERT INTO `tb_sirkit` VALUES ('247', '480', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:33');
INSERT INTO `tb_sirkit` VALUES ('248', '481', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:33');
INSERT INTO `tb_sirkit` VALUES ('249', '482', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:33');
INSERT INTO `tb_sirkit` VALUES ('250', '483', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:33');
INSERT INTO `tb_sirkit` VALUES ('251', '484', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:33');
INSERT INTO `tb_sirkit` VALUES ('252', '485', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:33');
INSERT INTO `tb_sirkit` VALUES ('253', '486', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:33');
INSERT INTO `tb_sirkit` VALUES ('254', '487', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:33');
INSERT INTO `tb_sirkit` VALUES ('255', '488', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:33');
INSERT INTO `tb_sirkit` VALUES ('256', '489', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:33');
INSERT INTO `tb_sirkit` VALUES ('257', '490', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:33');
INSERT INTO `tb_sirkit` VALUES ('258', '491', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:33');
INSERT INTO `tb_sirkit` VALUES ('259', '492', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:33');
INSERT INTO `tb_sirkit` VALUES ('260', '493', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:33');
INSERT INTO `tb_sirkit` VALUES ('261', '494', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:33');
INSERT INTO `tb_sirkit` VALUES ('262', '495', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:34');
INSERT INTO `tb_sirkit` VALUES ('263', '496', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:34');
INSERT INTO `tb_sirkit` VALUES ('264', '497', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:34');
INSERT INTO `tb_sirkit` VALUES ('265', '498', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:34');
INSERT INTO `tb_sirkit` VALUES ('266', '499', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:34');
INSERT INTO `tb_sirkit` VALUES ('267', '500', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:34');
INSERT INTO `tb_sirkit` VALUES ('268', '501', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:34');
INSERT INTO `tb_sirkit` VALUES ('269', '502', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:34');
INSERT INTO `tb_sirkit` VALUES ('270', '503', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:34');
INSERT INTO `tb_sirkit` VALUES ('271', '504', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:34');
INSERT INTO `tb_sirkit` VALUES ('272', '505', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:34');
INSERT INTO `tb_sirkit` VALUES ('273', '506', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:34');
INSERT INTO `tb_sirkit` VALUES ('274', '507', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:34');
INSERT INTO `tb_sirkit` VALUES ('275', '508', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:35');
INSERT INTO `tb_sirkit` VALUES ('276', '509', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:35');
INSERT INTO `tb_sirkit` VALUES ('277', '510', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:35');
INSERT INTO `tb_sirkit` VALUES ('278', '511', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:35');
INSERT INTO `tb_sirkit` VALUES ('279', '512', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:35');
INSERT INTO `tb_sirkit` VALUES ('280', '513', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:35');
INSERT INTO `tb_sirkit` VALUES ('281', '514', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:35');
INSERT INTO `tb_sirkit` VALUES ('282', '515', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:35');
INSERT INTO `tb_sirkit` VALUES ('283', '516', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:35');
INSERT INTO `tb_sirkit` VALUES ('284', '517', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:35');
INSERT INTO `tb_sirkit` VALUES ('285', '518', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:35');
INSERT INTO `tb_sirkit` VALUES ('286', '519', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:35');
INSERT INTO `tb_sirkit` VALUES ('287', '520', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:35');
INSERT INTO `tb_sirkit` VALUES ('288', '521', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:36');
INSERT INTO `tb_sirkit` VALUES ('289', '522', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:36');
INSERT INTO `tb_sirkit` VALUES ('290', '523', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:36');
INSERT INTO `tb_sirkit` VALUES ('291', '524', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:36');
INSERT INTO `tb_sirkit` VALUES ('292', '525', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:36');
INSERT INTO `tb_sirkit` VALUES ('293', '526', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:36');
INSERT INTO `tb_sirkit` VALUES ('294', '527', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:36');
INSERT INTO `tb_sirkit` VALUES ('295', '528', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:36');
INSERT INTO `tb_sirkit` VALUES ('296', '529', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:36');
INSERT INTO `tb_sirkit` VALUES ('297', '530', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:36');
INSERT INTO `tb_sirkit` VALUES ('298', '531', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:36');
INSERT INTO `tb_sirkit` VALUES ('299', '532', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:36');
INSERT INTO `tb_sirkit` VALUES ('300', '533', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:36');
INSERT INTO `tb_sirkit` VALUES ('301', '534', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:37');
INSERT INTO `tb_sirkit` VALUES ('302', '535', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:37');
INSERT INTO `tb_sirkit` VALUES ('303', '536', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:37');
INSERT INTO `tb_sirkit` VALUES ('304', '537', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:37');
INSERT INTO `tb_sirkit` VALUES ('305', '538', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:37');
INSERT INTO `tb_sirkit` VALUES ('306', '539', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:37');
INSERT INTO `tb_sirkit` VALUES ('307', '540', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:37');
INSERT INTO `tb_sirkit` VALUES ('308', '541', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:37');
INSERT INTO `tb_sirkit` VALUES ('309', '542', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:37');
INSERT INTO `tb_sirkit` VALUES ('310', '543', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:37');
INSERT INTO `tb_sirkit` VALUES ('311', '544', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:37');
INSERT INTO `tb_sirkit` VALUES ('312', '545', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:37');
INSERT INTO `tb_sirkit` VALUES ('313', '546', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:37');
INSERT INTO `tb_sirkit` VALUES ('314', '547', 'rusak', '26', '10', '8', '', '', 'NE53/2/17', 'A02_2_17', '', '', '', '', '', '2014-02-04 18:45:38');
INSERT INTO `tb_sirkit` VALUES ('315', '548', 'rusak', '21', '19', '1', '', '', '', '', '', '', '3_33_0', '', '', '2014-02-04 18:45:38');
INSERT INTO `tb_sirkit` VALUES ('316', '549', 'rusak', '20', '14', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:38');
INSERT INTO `tb_sirkit` VALUES ('317', '550', 'rusak', '18', '19', '5', '', '', 'ALCR5/1/1', 'D02_6_1', '', '', '', '', '', '2014-02-04 18:45:38');
INSERT INTO `tb_sirkit` VALUES ('318', '551', 'rusak', '21', '19', '12', '', '', 'NE 52/2/14', 'A09_4_14', '', '', '', '', '', '2014-02-04 18:45:38');
INSERT INTO `tb_sirkit` VALUES ('319', '552', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:38');
INSERT INTO `tb_sirkit` VALUES ('320', '553', 'rusak', '21', '19', '1', '', '', '', '', '', '', '3_15_0', '', '', '2014-02-04 18:45:38');
INSERT INTO `tb_sirkit` VALUES ('321', '554', 'rusak', '21', '19', '1', '', '', '', '', '', '', '4_36_1', '', '', '2014-02-04 18:45:38');
INSERT INTO `tb_sirkit` VALUES ('322', '555', 'rusak', '28', '19', '8', '', '', 'NE53/3/21', 'A02_3_21', '', '', '', '', '', '2014-02-04 18:45:38');
INSERT INTO `tb_sirkit` VALUES ('323', '556', 'rusak', '18', '19', '5', '', '', 'ALCR5/3/2', 'D02_6_2', '', '', '', '', '', '2014-02-04 18:45:38');
INSERT INTO `tb_sirkit` VALUES ('324', '557', 'rusak', '28', '19', '8', '', '', 'ALCR5/2/13', 'D02_5_13', '', '', '', '', '', '2014-02-04 18:45:38');
INSERT INTO `tb_sirkit` VALUES ('325', '558', 'rusak', '28', '19', '10', '', '', 'ALCR5/2/12', 'D02_5_12', '', '', '', '', '', '2014-02-04 18:45:38');
INSERT INTO `tb_sirkit` VALUES ('326', '559', 'rusak', '23', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:38');
INSERT INTO `tb_sirkit` VALUES ('327', '560', 'rusak', '18', '19', '8', '', '', 'NE105_1_15', 'A05_04_15', '', '', '', '', '', '2014-02-04 18:45:39');
INSERT INTO `tb_sirkit` VALUES ('328', '561', 'rusak', '21', '19', '13', '', '', '', 'CDC_9', '', '', '', '', '', '2014-02-04 18:45:39');
INSERT INTO `tb_sirkit` VALUES ('329', '562', 'rusak', '18', '9', '5', '', '', 'ALCR5_1_18', 'D02_04_18', '', '', '', '', '', '2014-02-04 18:45:39');
INSERT INTO `tb_sirkit` VALUES ('330', '563', 'rusak', '18', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:39');
INSERT INTO `tb_sirkit` VALUES ('331', '564', 'rusak', '28', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:39');
INSERT INTO `tb_sirkit` VALUES ('332', '565', 'rusak', '28', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:39');
INSERT INTO `tb_sirkit` VALUES ('333', '566', 'rusak', '28', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:39');
INSERT INTO `tb_sirkit` VALUES ('334', '567', 'rusak', '28', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:39');
INSERT INTO `tb_sirkit` VALUES ('335', '1', 'rusak', '6', '19', '14', '', '', '', 'DDFS_J07_06_14', '', '', '', '', '', '2014-02-04 18:45:39');
INSERT INTO `tb_sirkit` VALUES ('336', '2', 'rusak', '18', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:39');
INSERT INTO `tb_sirkit` VALUES ('337', '3', 'rusak', '18', '19', '8', '', '', 'NE99_3_8', 'A08_06_08', '', '', '', '', '', '2014-02-04 18:45:39');
INSERT INTO `tb_sirkit` VALUES ('338', '4', 'rusak', '23', '19', '8', '', '', 'ZTE', 'E05_12_15', '', '', '', '', '', '2014-02-04 18:45:39');
INSERT INTO `tb_sirkit` VALUES ('339', '5', 'rusak', '20', '14', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:39');
INSERT INTO `tb_sirkit` VALUES ('340', '6', 'rusak', '20', '14', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:39');
INSERT INTO `tb_sirkit` VALUES ('341', '7', 'rusak', '26', '19', '1', '', '', 'NE105_1_3', 'A05_04_03', '', '', '', '', '', '2014-02-04 18:45:40');
INSERT INTO `tb_sirkit` VALUES ('342', '8', 'rusak', '29', '19', '8', '', '', 'ZTE', 'K01_05_15', '', '', '', '', '', '2014-02-04 18:45:40');
INSERT INTO `tb_sirkit` VALUES ('343', '9', 'rusak', '15', '19', '1', '', '', 'NE105_1_4', 'A05_04_04', '', '', '', '', '', '2014-02-04 18:45:40');
INSERT INTO `tb_sirkit` VALUES ('344', '10', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:40');
INSERT INTO `tb_sirkit` VALUES ('345', '11', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:40');
INSERT INTO `tb_sirkit` VALUES ('346', '12', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:40');
INSERT INTO `tb_sirkit` VALUES ('347', '13', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:40');
INSERT INTO `tb_sirkit` VALUES ('348', '14', 'rusak', '6', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:40');
INSERT INTO `tb_sirkit` VALUES ('349', '15', 'rusak', '6', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:40');
INSERT INTO `tb_sirkit` VALUES ('350', '16', 'rusak', '18', '10', '8', '', '', 'ZTE', 'K01_05_06', '', '', '', '', '', '2014-02-04 18:45:40');
INSERT INTO `tb_sirkit` VALUES ('351', '17', 'rusak', '30', '20', '5', '', '', 'ALCR5_1_14', 'D02_5_14', '', '', '', '', '', '2014-02-04 18:45:40');
INSERT INTO `tb_sirkit` VALUES ('352', '18', 'rusak', '23', '19', '3', '', '', '', 'E05_11_21', '', '', '', '', '', '2014-02-04 18:45:40');
INSERT INTO `tb_sirkit` VALUES ('353', '19', 'rusak', '26', '19', '8', '', '', 'NE53_3_17', 'A02_03_17', '', '', '', '', '', '2014-02-04 18:45:40');
INSERT INTO `tb_sirkit` VALUES ('354', '20', 'rusak', '6', '21', '3', '', '', '', 'B06_08_24', '', '', '', '', '', '2014-02-04 18:45:40');
INSERT INTO `tb_sirkit` VALUES ('355', '21', 'rusak', '21', '18', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:40');
INSERT INTO `tb_sirkit` VALUES ('356', '568', 'rusak', '21', '19', '5', '', '', 'ALCR5_1_15', 'D02_04_15', '', '', '', '', '', '2014-02-04 18:45:40');
INSERT INTO `tb_sirkit` VALUES ('357', '569', 'rusak', '31', '22', '12', '', '', 'ZTE', 'K01_06_13', '', 'NGN', '', '', '', '2014-02-04 18:45:40');
INSERT INTO `tb_sirkit` VALUES ('358', '570', 'rusak', '18', '9', '5', '', '', 'ALCR5_2_16', 'D02_05_16', '', '', '', '', '', '2014-02-04 18:45:40');
INSERT INTO `tb_sirkit` VALUES ('359', '571', 'rusak', '21', '16', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:40');
INSERT INTO `tb_sirkit` VALUES ('360', '572', 'rusak', '18', '9', '5', '', '', 'ALCR5_1_17', 'D02_05_17', '', '', '', '', '', '2014-02-04 18:45:41');
INSERT INTO `tb_sirkit` VALUES ('361', '573', 'rusak', '21', '23', '1', '', '', '', '', '', '', '5-11-1', '', '', '2014-02-04 18:45:41');
INSERT INTO `tb_sirkit` VALUES ('362', '574', 'rusak', '20', '14', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:41');
INSERT INTO `tb_sirkit` VALUES ('363', '575', 'rusak', '21', '24', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:41');
INSERT INTO `tb_sirkit` VALUES ('364', '576', 'rusak', '21', '24', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:41');
INSERT INTO `tb_sirkit` VALUES ('365', '31', 'rusak', '31', '22', '8', '', '', 'NE99_3_19', 'A08_06_19', '', '', '', '', '', '2014-02-04 18:45:41');
INSERT INTO `tb_sirkit` VALUES ('366', '32', 'rusak', '21', '24', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:41');
INSERT INTO `tb_sirkit` VALUES ('367', '33', 'rusak', '6', '9', '5', '', '', '', '', 'T3_10', '', '', '', '', '2014-02-04 18:45:41');
INSERT INTO `tb_sirkit` VALUES ('368', '34', 'rusak', '23', '19', '8', '', '', 'GMDT1_4_4_1', 'B09_05_17', '', '', '', '', '', '2014-02-04 18:45:41');
INSERT INTO `tb_sirkit` VALUES ('369', '35', 'rusak', '6', '19', '11', '', '', '', '', '14L_8_3', '', '', '', '', '2014-02-04 18:45:41');
INSERT INTO `tb_sirkit` VALUES ('370', '36', 'rusak', '6', '19', '11', '', '', '', '', '14L_8_4', '', '', '', '', '2014-02-04 18:45:41');
INSERT INTO `tb_sirkit` VALUES ('371', '37', 'rusak', '23', '21', '1', '', '', 'ZTE', 'E05_06_15', '', '', '', '', '', '2014-02-04 18:45:41');
INSERT INTO `tb_sirkit` VALUES ('372', '38', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:41');
INSERT INTO `tb_sirkit` VALUES ('373', '39', 'rusak', '32', '21', '3', '', '', 'MR23_6_7', 'F02_06_07', '', '5006', '', '', 'PT. ORIENT (TENSIN)', '2014-02-04 18:45:41');
INSERT INTO `tb_sirkit` VALUES ('374', '40', 'rusak', '17', '21', '3', '', '', 'MR 25_5_16', 'F04_05_16', '', '4969', '', '', '', '2014-02-04 18:45:41');
INSERT INTO `tb_sirkit` VALUES ('375', '41', 'rusak', '20', '21', '3', '', '', 'MR23_10_05', 'F02_10_05', '', '60', '', '', 'PT. ORIENT', '2014-02-04 18:45:41');
INSERT INTO `tb_sirkit` VALUES ('376', '42', 'rusak', '33', '21', '3', '', '', '3_1_12_21', 'K02_03_21', '', '4980', '', '', 'T/C JEMBER', '2014-02-04 18:45:41');
INSERT INTO `tb_sirkit` VALUES ('377', '577', 'rusak', '21', '19', '1', '', '', '', '', '', '', '3-15-3', '', '', '2014-02-04 18:45:42');
INSERT INTO `tb_sirkit` VALUES ('378', '578', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:42');
INSERT INTO `tb_sirkit` VALUES ('379', '579', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:42');
INSERT INTO `tb_sirkit` VALUES ('380', '580', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:42');
INSERT INTO `tb_sirkit` VALUES ('381', '581', 'rusak', '21', '19', '1', '', '', '', '', '', '', '3-09-3', '', '', '2014-02-04 18:45:42');
INSERT INTO `tb_sirkit` VALUES ('382', '582', 'rusak', '21', '19', '1', '', '', '', '', '', '', '3-10-3', '', '', '2014-02-04 18:45:42');
INSERT INTO `tb_sirkit` VALUES ('383', '583', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:42');
INSERT INTO `tb_sirkit` VALUES ('384', '584', 'rusak', '21', '19', '1', '', '', '', '', '', '', '3-13-3', '', '', '2014-02-04 18:45:42');
INSERT INTO `tb_sirkit` VALUES ('385', '585', 'rusak', '21', '19', '1', '', '', '', '', '', '', '3-14-3', '', '', '2014-02-04 18:45:42');
INSERT INTO `tb_sirkit` VALUES ('386', '586', 'rusak', '21', '19', '1', '', '', '', '', '', '', '2-62-0', '', '', '2014-02-04 18:45:42');
INSERT INTO `tb_sirkit` VALUES ('387', '587', 'rusak', '21', '23', '1', '', '', '', '', '', '', '2-63-0', '', '', '2014-02-04 18:45:42');
INSERT INTO `tb_sirkit` VALUES ('388', '588', 'rusak', '21', '23', '1', '', '', '', '', '', '', '3-18-0', '', '', '2014-02-04 18:45:42');
INSERT INTO `tb_sirkit` VALUES ('389', '589', 'rusak', '21', '23', '1', '', '', '', '', '', '', '5-44-0', '', '', '2014-02-04 18:45:42');
INSERT INTO `tb_sirkit` VALUES ('390', '590', 'rusak', '21', '23', '1', '', '', '', '', '', '', '5-45-0', '', '', '2014-02-04 18:45:43');
INSERT INTO `tb_sirkit` VALUES ('391', '591', 'rusak', '21', '19', '1', '', '', '', '.', '', '', '5-46-0', '', '', '2014-02-04 18:45:43');
INSERT INTO `tb_sirkit` VALUES ('392', '592', 'rusak', '21', '19', '1', '', '', '', '', '', '', '5-47-0', '', '', '2014-02-04 18:45:43');
INSERT INTO `tb_sirkit` VALUES ('393', '593', 'rusak', '21', '19', '1', '', '', '', '', '', '', '5-48-0', '', '', '2014-02-04 18:45:43');
INSERT INTO `tb_sirkit` VALUES ('394', '594', 'rusak', '21', '19', '1', '', '', 'JKT 4-06-1', '', '', '', '0-14-2', '', '', '2014-02-04 18:45:43');
INSERT INTO `tb_sirkit` VALUES ('395', '595', 'rusak', '21', '23', '1', '', '', '', '', '', '', '5-26-3', '', '', '2014-02-04 18:45:43');
INSERT INTO `tb_sirkit` VALUES ('396', '596', 'rusak', '21', '10', '1', '', '', 'JKT 4-0-16', '', '', '', '0-34-1', '', '', '2014-02-04 18:45:43');
INSERT INTO `tb_sirkit` VALUES ('397', '597', 'rusak', '21', '24', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:43');
INSERT INTO `tb_sirkit` VALUES ('398', '598', 'rusak', '21', '24', '1', '', '', 'JKT 0-10-3', '', '', '', '4-09-1', '', '', '2014-02-04 18:45:43');
INSERT INTO `tb_sirkit` VALUES ('399', '599', 'rusak', '21', '24', '1', '', '', 'JKT 0-11-3', '', '', '', '4-10-1', '', '', '2014-02-04 18:45:43');
INSERT INTO `tb_sirkit` VALUES ('400', '600', 'rusak', '18', '21', '1', '', '', 'ALCR5_1_19 ', 'D02_05_19', '', '', '', '', '', '2014-02-04 18:45:43');
INSERT INTO `tb_sirkit` VALUES ('401', '601', 'rusak', '20', '21', '1', '', '', 'OR28_07_15', 'D13_07_15', '', '', '', '', 'PT ORIENT', '2014-02-04 18:45:43');
INSERT INTO `tb_sirkit` VALUES ('402', '602', 'rusak', '21', '25', '1', '', '', '', '', '', '', '3-41-0', '', '', '2014-02-04 18:45:44');
INSERT INTO `tb_sirkit` VALUES ('403', '603', 'rusak', '21', '25', '1', '', '', '', '', '', '', '4-07-2', '', '', '2014-02-04 18:45:44');
INSERT INTO `tb_sirkit` VALUES ('404', '604', 'rusak', '21', '25', '1', '', '', '', '', '', '', '4-09-2', '', '', '2014-02-04 18:45:44');
INSERT INTO `tb_sirkit` VALUES ('405', '605', 'rusak', '2', '10', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:44');
INSERT INTO `tb_sirkit` VALUES ('406', '606', 'rusak', '21', '24', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:44');
INSERT INTO `tb_sirkit` VALUES ('407', '607', 'rusak', '21', '24', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:44');
INSERT INTO `tb_sirkit` VALUES ('408', '608', 'rusak', '34', '21', '3', '', '', 'MR26_3_2', 'F05_03_02', '', '', '', '', '', '2014-02-04 18:45:44');
INSERT INTO `tb_sirkit` VALUES ('409', '609', 'rusak', '6', '21', '1', '', '', '', 'J07_07_06', '', '551', '', '', '', '2014-02-04 18:45:44');
INSERT INTO `tb_sirkit` VALUES ('410', '610', 'rusak', '23', '10', '3', '', '', '', 'J07_07_06', '', '551', '', '', '', '2014-02-04 18:45:44');
INSERT INTO `tb_sirkit` VALUES ('411', '611', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:44');
INSERT INTO `tb_sirkit` VALUES ('412', '612', 'rusak', '23', '19', '8', '', '', '', 'B09_07_18', '', '', '', '', '', '2014-02-04 18:45:45');
INSERT INTO `tb_sirkit` VALUES ('413', '613', 'rusak', '18', '26', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:45');
INSERT INTO `tb_sirkit` VALUES ('414', '614', 'rusak', '18', '21', '5', '', '', 'ALCR5_2_3', 'D02_06_03', '', '', '', '', '', '2014-02-04 18:45:45');
INSERT INTO `tb_sirkit` VALUES ('415', '615', 'rusak', '14', '24', '9', '', '', 'JKT 3-59-1', '', '', '', '4-11-1', '', '', '2014-02-04 18:45:45');
INSERT INTO `tb_sirkit` VALUES ('416', '616', 'rusak', '21', '24', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:45');
INSERT INTO `tb_sirkit` VALUES ('417', '617', 'rusak', '15', '21', '11', '', '', 'ALCR2_3_15', 'D01_3_15', '', '', '', '', '', '2014-02-04 18:45:45');
INSERT INTO `tb_sirkit` VALUES ('418', '618', 'rusak', '15', '21', '11', '', '', 'ALCR2_3_16', 'D01_3_16', '', '', '', '', '', '2014-02-04 18:45:45');
INSERT INTO `tb_sirkit` VALUES ('419', '619', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:45');
INSERT INTO `tb_sirkit` VALUES ('420', '620', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:45');
INSERT INTO `tb_sirkit` VALUES ('421', '621', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:45');
INSERT INTO `tb_sirkit` VALUES ('422', '622', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:45');
INSERT INTO `tb_sirkit` VALUES ('423', '623', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:45');
INSERT INTO `tb_sirkit` VALUES ('424', '624', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:46');
INSERT INTO `tb_sirkit` VALUES ('425', '625', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:46');
INSERT INTO `tb_sirkit` VALUES ('426', '626', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:46');
INSERT INTO `tb_sirkit` VALUES ('427', '627', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:46');
INSERT INTO `tb_sirkit` VALUES ('428', '628', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:46');
INSERT INTO `tb_sirkit` VALUES ('429', '629', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:46');
INSERT INTO `tb_sirkit` VALUES ('430', '630', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:46');
INSERT INTO `tb_sirkit` VALUES ('431', '631', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:46');
INSERT INTO `tb_sirkit` VALUES ('432', '632', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:46');
INSERT INTO `tb_sirkit` VALUES ('433', '633', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:46');
INSERT INTO `tb_sirkit` VALUES ('434', '634', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:46');
INSERT INTO `tb_sirkit` VALUES ('435', '635', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:46');
INSERT INTO `tb_sirkit` VALUES ('436', '636', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:47');
INSERT INTO `tb_sirkit` VALUES ('437', '637', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:47');
INSERT INTO `tb_sirkit` VALUES ('438', '638', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:47');
INSERT INTO `tb_sirkit` VALUES ('439', '639', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:47');
INSERT INTO `tb_sirkit` VALUES ('440', '640', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:47');
INSERT INTO `tb_sirkit` VALUES ('441', '641', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:47');
INSERT INTO `tb_sirkit` VALUES ('442', '642', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:47');
INSERT INTO `tb_sirkit` VALUES ('443', '643', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:47');
INSERT INTO `tb_sirkit` VALUES ('444', '644', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:47');
INSERT INTO `tb_sirkit` VALUES ('445', '645', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:47');
INSERT INTO `tb_sirkit` VALUES ('446', '646', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:47');
INSERT INTO `tb_sirkit` VALUES ('447', '647', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:47');
INSERT INTO `tb_sirkit` VALUES ('448', '648', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:48');
INSERT INTO `tb_sirkit` VALUES ('449', '649', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:48');
INSERT INTO `tb_sirkit` VALUES ('450', '650', 'rusak', '21', '19', '3', '', '', '', '', 'VOIP 8_01', '1757', '', '', '', '2014-02-04 18:45:48');
INSERT INTO `tb_sirkit` VALUES ('451', '651', 'rusak', '21', '19', '3', '', '', '', '', 'VOIP 8_04', '1758', '', '', '', '2014-02-04 18:45:48');
INSERT INTO `tb_sirkit` VALUES ('452', '652', 'rusak', '21', '19', '3', '', '', '', '', 'VOIP 10_24', '1760', '', '', '', '2014-02-04 18:45:48');
INSERT INTO `tb_sirkit` VALUES ('453', '653', 'rusak', '21', '19', '3', '', '', '', 'B02_01_24', '', '183', '', '', '', '2014-02-04 18:45:48');
INSERT INTO `tb_sirkit` VALUES ('454', '654', 'rusak', '21', '16', '1', '', '', '', '', '', '', '1-46-0', '', '', '2014-02-04 18:45:48');
INSERT INTO `tb_sirkit` VALUES ('455', '655', 'rusak', '21', '16', '1', '', '', '', '', '', '', '1-47-0', '', '', '2014-02-04 18:45:48');
INSERT INTO `tb_sirkit` VALUES ('456', '656', 'rusak', '21', '16', '1', '', '', '', '', '', '', '1-48-0', '', '', '2014-02-04 18:45:48');
INSERT INTO `tb_sirkit` VALUES ('457', '657', 'rusak', '21', '16', '1', '', '', '', '', '', '', '4-35-1', '', '', '2014-02-04 18:45:48');
INSERT INTO `tb_sirkit` VALUES ('458', '658', 'rusak', '35', '19', '11', '', '', '', ' B15_11_05', 'J11_E3_5', '', '', '', '', '2014-02-04 18:45:48');
INSERT INTO `tb_sirkit` VALUES ('459', '659', 'rusak', '35', '19', '11', '', '', '', 'F11_06_05', '15Q_6_5', '', '', '', '', '2014-02-04 18:45:49');
INSERT INTO `tb_sirkit` VALUES ('460', '660', 'rusak', '35', '19', '11', '', '', '', ' B15_11_18', 'J11_E3_18', '', '', '', '', '2014-02-04 18:45:49');
INSERT INTO `tb_sirkit` VALUES ('461', '661', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:49');
INSERT INTO `tb_sirkit` VALUES ('462', '662', 'rusak', '21', '21', '1', '', '', '', '', 'C05_12_12', '', '', '', '', '2014-02-04 18:45:49');
INSERT INTO `tb_sirkit` VALUES ('463', '663', 'rusak', '21', '24', '1', '', '', '', '', '', '', '3-40-1', '', '', '2014-02-04 18:45:49');
INSERT INTO `tb_sirkit` VALUES ('464', '664', 'rusak', '21', '21', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:49');
INSERT INTO `tb_sirkit` VALUES ('465', '665', 'rusak', '21', '21', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:49');
INSERT INTO `tb_sirkit` VALUES ('466', '666', 'rusak', '21', '19', '15', '', '', '', 'C05_12_13', 'CSM 2-13', '', '', '', 'CIKARANG', '2014-02-04 18:45:49');
INSERT INTO `tb_sirkit` VALUES ('467', '667', 'rusak', '21', '24', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:49');
INSERT INTO `tb_sirkit` VALUES ('468', '668', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:49');
INSERT INTO `tb_sirkit` VALUES ('469', '669', 'rusak', '21', '24', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:50');
INSERT INTO `tb_sirkit` VALUES ('470', '670', 'rusak', '21', '24', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:50');
INSERT INTO `tb_sirkit` VALUES ('471', '671', 'rusak', '21', '19', '3', '', '', 'OR 31_08_15', 'D16_08_15', '', '4462', '', '', '', '2014-02-04 18:45:50');
INSERT INTO `tb_sirkit` VALUES ('472', '672', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:50');
INSERT INTO `tb_sirkit` VALUES ('473', '673', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:50');
INSERT INTO `tb_sirkit` VALUES ('474', '674', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:50');
INSERT INTO `tb_sirkit` VALUES ('475', '675', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:50');
INSERT INTO `tb_sirkit` VALUES ('476', '676', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:50');
INSERT INTO `tb_sirkit` VALUES ('477', '677', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:50');
INSERT INTO `tb_sirkit` VALUES ('478', '678', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:50');
INSERT INTO `tb_sirkit` VALUES ('479', '679', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:50');
INSERT INTO `tb_sirkit` VALUES ('480', '680', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:51');
INSERT INTO `tb_sirkit` VALUES ('481', '681', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:51');
INSERT INTO `tb_sirkit` VALUES ('482', '682', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:51');
INSERT INTO `tb_sirkit` VALUES ('483', '683', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:51');
INSERT INTO `tb_sirkit` VALUES ('484', '684', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:51');
INSERT INTO `tb_sirkit` VALUES ('485', '685', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:51');
INSERT INTO `tb_sirkit` VALUES ('486', '686', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:51');
INSERT INTO `tb_sirkit` VALUES ('487', '687', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:51');
INSERT INTO `tb_sirkit` VALUES ('488', '688', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:51');
INSERT INTO `tb_sirkit` VALUES ('489', '689', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:51');
INSERT INTO `tb_sirkit` VALUES ('490', '690', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:51');
INSERT INTO `tb_sirkit` VALUES ('491', '691', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:52');
INSERT INTO `tb_sirkit` VALUES ('492', '692', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:52');
INSERT INTO `tb_sirkit` VALUES ('493', '693', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:52');
INSERT INTO `tb_sirkit` VALUES ('494', '694', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:52');
INSERT INTO `tb_sirkit` VALUES ('495', '695', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:52');
INSERT INTO `tb_sirkit` VALUES ('496', '696', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:52');
INSERT INTO `tb_sirkit` VALUES ('497', '697', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:52');
INSERT INTO `tb_sirkit` VALUES ('498', '698', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:52');
INSERT INTO `tb_sirkit` VALUES ('499', '699', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:52');
INSERT INTO `tb_sirkit` VALUES ('500', '700', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:52');
INSERT INTO `tb_sirkit` VALUES ('501', '701', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:52');
INSERT INTO `tb_sirkit` VALUES ('502', '702', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:52');
INSERT INTO `tb_sirkit` VALUES ('503', '703', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:53');
INSERT INTO `tb_sirkit` VALUES ('504', '704', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:53');
INSERT INTO `tb_sirkit` VALUES ('505', '705', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:53');
INSERT INTO `tb_sirkit` VALUES ('506', '706', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:53');
INSERT INTO `tb_sirkit` VALUES ('507', '707', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:53');
INSERT INTO `tb_sirkit` VALUES ('508', '708', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:53');
INSERT INTO `tb_sirkit` VALUES ('509', '709', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:53');
INSERT INTO `tb_sirkit` VALUES ('510', '710', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:53');
INSERT INTO `tb_sirkit` VALUES ('511', '711', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:53');
INSERT INTO `tb_sirkit` VALUES ('512', '712', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:53');
INSERT INTO `tb_sirkit` VALUES ('513', '713', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:53');
INSERT INTO `tb_sirkit` VALUES ('514', '714', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:53');
INSERT INTO `tb_sirkit` VALUES ('515', '715', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:54');
INSERT INTO `tb_sirkit` VALUES ('516', '716', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:54');
INSERT INTO `tb_sirkit` VALUES ('517', '717', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:54');
INSERT INTO `tb_sirkit` VALUES ('518', '718', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:54');
INSERT INTO `tb_sirkit` VALUES ('519', '719', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:54');
INSERT INTO `tb_sirkit` VALUES ('520', '720', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:54');
INSERT INTO `tb_sirkit` VALUES ('521', '721', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:54');
INSERT INTO `tb_sirkit` VALUES ('522', '722', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:54');
INSERT INTO `tb_sirkit` VALUES ('523', '723', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:54');
INSERT INTO `tb_sirkit` VALUES ('524', '724', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:54');
INSERT INTO `tb_sirkit` VALUES ('525', '725', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:55');
INSERT INTO `tb_sirkit` VALUES ('526', '726', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:55');
INSERT INTO `tb_sirkit` VALUES ('527', '727', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:55');
INSERT INTO `tb_sirkit` VALUES ('528', '728', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:55');
INSERT INTO `tb_sirkit` VALUES ('529', '729', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:55');
INSERT INTO `tb_sirkit` VALUES ('530', '730', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:55');
INSERT INTO `tb_sirkit` VALUES ('531', '731', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:55');
INSERT INTO `tb_sirkit` VALUES ('532', '732', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:55');
INSERT INTO `tb_sirkit` VALUES ('533', '733', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:55');
INSERT INTO `tb_sirkit` VALUES ('534', '734', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:55');
INSERT INTO `tb_sirkit` VALUES ('535', '735', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:55');
INSERT INTO `tb_sirkit` VALUES ('536', '736', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:56');
INSERT INTO `tb_sirkit` VALUES ('537', '737', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:56');
INSERT INTO `tb_sirkit` VALUES ('538', '738', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:56');
INSERT INTO `tb_sirkit` VALUES ('539', '739', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:56');
INSERT INTO `tb_sirkit` VALUES ('540', '740', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:56');
INSERT INTO `tb_sirkit` VALUES ('541', '741', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:56');
INSERT INTO `tb_sirkit` VALUES ('542', '742', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:56');
INSERT INTO `tb_sirkit` VALUES ('543', '743', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:56');
INSERT INTO `tb_sirkit` VALUES ('544', '744', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:56');
INSERT INTO `tb_sirkit` VALUES ('545', '745', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:56');
INSERT INTO `tb_sirkit` VALUES ('546', '746', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:56');
INSERT INTO `tb_sirkit` VALUES ('547', '747', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:57');
INSERT INTO `tb_sirkit` VALUES ('548', '748', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:57');
INSERT INTO `tb_sirkit` VALUES ('549', '749', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:57');
INSERT INTO `tb_sirkit` VALUES ('550', '750', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:57');
INSERT INTO `tb_sirkit` VALUES ('551', '751', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:57');
INSERT INTO `tb_sirkit` VALUES ('552', '752', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:57');
INSERT INTO `tb_sirkit` VALUES ('553', '753', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:57');
INSERT INTO `tb_sirkit` VALUES ('554', '754', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:57');
INSERT INTO `tb_sirkit` VALUES ('555', '755', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:57');
INSERT INTO `tb_sirkit` VALUES ('556', '756', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:57');
INSERT INTO `tb_sirkit` VALUES ('557', '757', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:57');
INSERT INTO `tb_sirkit` VALUES ('558', '758', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:58');
INSERT INTO `tb_sirkit` VALUES ('559', '759', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:58');
INSERT INTO `tb_sirkit` VALUES ('560', '760', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:58');
INSERT INTO `tb_sirkit` VALUES ('561', '761', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:58');
INSERT INTO `tb_sirkit` VALUES ('562', '762', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:58');
INSERT INTO `tb_sirkit` VALUES ('563', '763', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:58');
INSERT INTO `tb_sirkit` VALUES ('564', '764', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:58');
INSERT INTO `tb_sirkit` VALUES ('565', '765', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:58');
INSERT INTO `tb_sirkit` VALUES ('566', '766', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:58');
INSERT INTO `tb_sirkit` VALUES ('567', '767', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:58');
INSERT INTO `tb_sirkit` VALUES ('568', '768', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:58');
INSERT INTO `tb_sirkit` VALUES ('569', '769', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:58');
INSERT INTO `tb_sirkit` VALUES ('570', '770', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:59');
INSERT INTO `tb_sirkit` VALUES ('571', '771', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:59');
INSERT INTO `tb_sirkit` VALUES ('572', '772', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:59');
INSERT INTO `tb_sirkit` VALUES ('573', '773', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:59');
INSERT INTO `tb_sirkit` VALUES ('574', '774', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:59');
INSERT INTO `tb_sirkit` VALUES ('575', '775', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:59');
INSERT INTO `tb_sirkit` VALUES ('576', '776', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:59');
INSERT INTO `tb_sirkit` VALUES ('577', '777', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:59');
INSERT INTO `tb_sirkit` VALUES ('578', '778', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:59');
INSERT INTO `tb_sirkit` VALUES ('579', '779', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:59');
INSERT INTO `tb_sirkit` VALUES ('580', '780', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:45:59');
INSERT INTO `tb_sirkit` VALUES ('581', '781', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:00');
INSERT INTO `tb_sirkit` VALUES ('582', '782', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:00');
INSERT INTO `tb_sirkit` VALUES ('583', '783', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:00');
INSERT INTO `tb_sirkit` VALUES ('584', '784', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:00');
INSERT INTO `tb_sirkit` VALUES ('585', '785', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:00');
INSERT INTO `tb_sirkit` VALUES ('586', '786', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:00');
INSERT INTO `tb_sirkit` VALUES ('587', '787', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:00');
INSERT INTO `tb_sirkit` VALUES ('588', '788', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:00');
INSERT INTO `tb_sirkit` VALUES ('589', '789', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:00');
INSERT INTO `tb_sirkit` VALUES ('590', '790', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:00');
INSERT INTO `tb_sirkit` VALUES ('591', '791', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:00');
INSERT INTO `tb_sirkit` VALUES ('592', '792', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:00');
INSERT INTO `tb_sirkit` VALUES ('593', '793', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:01');
INSERT INTO `tb_sirkit` VALUES ('594', '794', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:01');
INSERT INTO `tb_sirkit` VALUES ('595', '795', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:01');
INSERT INTO `tb_sirkit` VALUES ('596', '796', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:01');
INSERT INTO `tb_sirkit` VALUES ('597', '797', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:01');
INSERT INTO `tb_sirkit` VALUES ('598', '798', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:01');
INSERT INTO `tb_sirkit` VALUES ('599', '799', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:01');
INSERT INTO `tb_sirkit` VALUES ('600', '800', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:01');
INSERT INTO `tb_sirkit` VALUES ('601', '801', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:01');
INSERT INTO `tb_sirkit` VALUES ('602', '802', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:01');
INSERT INTO `tb_sirkit` VALUES ('603', '803', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:01');
INSERT INTO `tb_sirkit` VALUES ('604', '804', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:01');
INSERT INTO `tb_sirkit` VALUES ('605', '805', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:02');
INSERT INTO `tb_sirkit` VALUES ('606', '806', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:02');
INSERT INTO `tb_sirkit` VALUES ('607', '807', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:02');
INSERT INTO `tb_sirkit` VALUES ('608', '808', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:02');
INSERT INTO `tb_sirkit` VALUES ('609', '809', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:02');
INSERT INTO `tb_sirkit` VALUES ('610', '810', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:02');
INSERT INTO `tb_sirkit` VALUES ('611', '811', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:02');
INSERT INTO `tb_sirkit` VALUES ('612', '812', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:02');
INSERT INTO `tb_sirkit` VALUES ('613', '813', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:02');
INSERT INTO `tb_sirkit` VALUES ('614', '814', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:03');
INSERT INTO `tb_sirkit` VALUES ('615', '815', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:03');
INSERT INTO `tb_sirkit` VALUES ('616', '816', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:03');
INSERT INTO `tb_sirkit` VALUES ('617', '817', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:03');
INSERT INTO `tb_sirkit` VALUES ('618', '818', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:03');
INSERT INTO `tb_sirkit` VALUES ('619', '819', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:03');
INSERT INTO `tb_sirkit` VALUES ('620', '820', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:03');
INSERT INTO `tb_sirkit` VALUES ('621', '821', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:03');
INSERT INTO `tb_sirkit` VALUES ('622', '822', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:03');
INSERT INTO `tb_sirkit` VALUES ('623', '823', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:03');
INSERT INTO `tb_sirkit` VALUES ('624', '824', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:04');
INSERT INTO `tb_sirkit` VALUES ('625', '825', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:04');
INSERT INTO `tb_sirkit` VALUES ('626', '826', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:04');
INSERT INTO `tb_sirkit` VALUES ('627', '827', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:04');
INSERT INTO `tb_sirkit` VALUES ('628', '828', 'rusak', '21', '19', '16', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:04');
INSERT INTO `tb_sirkit` VALUES ('629', '829', 'rusak', '21', '19', '1', '', '', '', '', '', '', '7-04-3', '', '', '2014-02-04 18:46:04');
INSERT INTO `tb_sirkit` VALUES ('630', '830', 'rusak', '21', '19', '1', '', '', '', '', '', '', '7-05-3', '', '', '2014-02-04 18:46:04');
INSERT INTO `tb_sirkit` VALUES ('631', '831', 'rusak', '21', '19', '1', '', '', '', '', '', '', '7-06-3', '', '', '2014-02-04 18:46:04');
INSERT INTO `tb_sirkit` VALUES ('632', '832', 'rusak', '21', '19', '1', '', '', '', '', '', '', '7-07-3', '', '', '2014-02-04 18:46:04');
INSERT INTO `tb_sirkit` VALUES ('633', '833', 'rusak', '21', '19', '1', '', '', '', '', '', '', '7-08-3', '', '', '2014-02-04 18:46:04');
INSERT INTO `tb_sirkit` VALUES ('634', '834', 'rusak', '21', '24', '1', '', '', '', '', '', '', '2-35-3', '', '', '2014-02-04 18:46:05');
INSERT INTO `tb_sirkit` VALUES ('635', '835', 'rusak', '21', '24', '1', '', '', '', '', '', '', '2-42-2', '', '', '2014-02-04 18:46:05');
INSERT INTO `tb_sirkit` VALUES ('636', '836', 'rusak', '21', '19', '1', '', '', '', '', '', '', '7-06-2', '', '', '2014-02-04 18:46:05');
INSERT INTO `tb_sirkit` VALUES ('637', '837', 'rusak', '21', '19', '1', '', '', '', '', '', '', '7-07-0', '', '', '2014-02-04 18:46:05');
INSERT INTO `tb_sirkit` VALUES ('638', '838', 'rusak', '21', '19', '1', '', '', '', '', '', '', '7-07-1', '', '', '2014-02-04 18:46:05');
INSERT INTO `tb_sirkit` VALUES ('639', '839', 'rusak', '21', '19', '1', '', '', '', '', '', '', '7-07-2', '', '', '2014-02-04 18:46:05');
INSERT INTO `tb_sirkit` VALUES ('640', '840', 'rusak', '21', '19', '1', '', '', '', '', '', '', '7-08-0', '', '', '2014-02-04 18:46:05');
INSERT INTO `tb_sirkit` VALUES ('641', '841', 'rusak', '21', '19', '1', '', '', '', '', '', '', '7-08-1', '', '', '2014-02-04 18:46:05');
INSERT INTO `tb_sirkit` VALUES ('642', '842', 'rusak', '21', '19', '1', '', '', '', '', '', '', '7-08-2', '', '', '2014-02-04 18:46:05');
INSERT INTO `tb_sirkit` VALUES ('643', '843', 'rusak', '21', '24', '1', '', '', '', '', '', '', '2-55-3', '', '', '2014-02-04 18:46:05');
INSERT INTO `tb_sirkit` VALUES ('644', '844', 'rusak', '21', '24', '1', '', '', '', '', '', '', '2-56-1', '', '', '2014-02-04 18:46:05');
INSERT INTO `tb_sirkit` VALUES ('645', '845', 'rusak', '14', '24', '9', '', '', '', '', '', '', '2-17-1', '', '', '2014-02-04 18:46:05');
INSERT INTO `tb_sirkit` VALUES ('646', '846', 'rusak', '14', '24', '9', '', '', '', '', '', '', '2-24-2', '', '', '2014-02-04 18:46:06');
INSERT INTO `tb_sirkit` VALUES ('647', '847', 'rusak', '21', '24', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:06');
INSERT INTO `tb_sirkit` VALUES ('648', '848', 'rusak', '21', '24', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:06');
INSERT INTO `tb_sirkit` VALUES ('649', '849', 'rusak', '21', '19', '17', '', '', '', '', '', '', '4-08-1', '', '', '2014-02-04 18:46:06');
INSERT INTO `tb_sirkit` VALUES ('650', '850', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:06');
INSERT INTO `tb_sirkit` VALUES ('651', '851', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:06');
INSERT INTO `tb_sirkit` VALUES ('652', '852', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:06');
INSERT INTO `tb_sirkit` VALUES ('653', '853', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:06');
INSERT INTO `tb_sirkit` VALUES ('654', '854', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:06');
INSERT INTO `tb_sirkit` VALUES ('655', '855', 'rusak', '21', '19', '3', '', '', '', '', 'J07_07_05', '556', '', '', '', '2014-02-04 18:46:06');
INSERT INTO `tb_sirkit` VALUES ('656', '856', 'rusak', '21', '19', '1', '', '', '', '', 'VOIP 9_13', '3229', '', '', 'JATI NEGARA', '2014-02-04 18:46:06');
INSERT INTO `tb_sirkit` VALUES ('657', '857', 'rusak', '26', '19', '8', '', '', 'NE53_3_18', '', '', '', '', '', '', '2014-02-04 18:46:07');
INSERT INTO `tb_sirkit` VALUES ('658', '858', 'rusak', '21', '19', '1', '', '', '', '', '', '', '3-32-1', '', '', '2014-02-04 18:46:07');
INSERT INTO `tb_sirkit` VALUES ('659', '859', 'rusak', '24', '19', '8', '', '', 'ZTE', 'K01_06_02', '', '', '', '', '', '2014-02-04 18:46:07');
INSERT INTO `tb_sirkit` VALUES ('660', '860', 'rusak', '26', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:07');
INSERT INTO `tb_sirkit` VALUES ('661', '861', 'rusak', '21', '19', '1', '', '', '', '', '', '', '1-12-3', '', '', '2014-02-04 18:46:07');
INSERT INTO `tb_sirkit` VALUES ('662', '862', 'rusak', '14', '19', '9', '', '', '', '', '', '', '0-26-2', '', '', '2014-02-04 18:46:07');
INSERT INTO `tb_sirkit` VALUES ('663', '863', 'rusak', '14', '19', '9', '', '', '', '', '', '', '0-28-2', '', '', '2014-02-04 18:46:07');
INSERT INTO `tb_sirkit` VALUES ('664', '864', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:07');
INSERT INTO `tb_sirkit` VALUES ('665', '865', 'rusak', '21', '19', '8', '', '', 'NE53_03_20', '', '', '', '', '', '', '2014-02-04 18:46:07');
INSERT INTO `tb_sirkit` VALUES ('666', '866', 'rusak', '21', '19', '1', '', '', '', '', '', '', '2-18-2', '', '', '2014-02-04 18:46:07');
INSERT INTO `tb_sirkit` VALUES ('667', '867', 'rusak', '21', '19', '8', '', '', ' NE52_1_06', '', '', '', '', '', '', '2014-02-04 18:46:07');
INSERT INTO `tb_sirkit` VALUES ('668', '868', 'rusak', '6', '9', '1', '', '', '', '', '', '', '4-24-3', '', '', '2014-02-04 18:46:07');
INSERT INTO `tb_sirkit` VALUES ('669', '869', 'rusak', '21', '19', '3', '', '', '', 'B15_5_4', 'J5_4', '268', '', '', 'R.PCM', '2014-02-04 18:46:08');
INSERT INTO `tb_sirkit` VALUES ('670', '870', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:08');
INSERT INTO `tb_sirkit` VALUES ('671', '871', 'rusak', '21', '27', '1', '', '', '055DDFT_B08_08_12', '', '', '30N243', '3-45-2', '', '', '2014-02-04 18:46:08');
INSERT INTO `tb_sirkit` VALUES ('672', '872', 'rusak', '21', '27', '1', '', '', '055DDFT_B08_08_13', '', '', '30N244', '3-46-3', '', '', '2014-02-04 18:46:08');
INSERT INTO `tb_sirkit` VALUES ('673', '873', 'rusak', '21', '27', '1', '', '', '055DDFT_B09_03_11', '', '', '30N245', '3-48-3', '', '', '2014-02-04 18:46:08');
INSERT INTO `tb_sirkit` VALUES ('674', '874', 'rusak', '21', '27', '1', '', '', '055DDFT_B09_03_12', '', '', '30N246', '6-52-0', '', '', '2014-02-04 18:46:08');
INSERT INTO `tb_sirkit` VALUES ('675', '875', 'rusak', '21', '27', '1', '', '', '055DDFT_B09_03_13', '', '', '30N247', '6-52-1', '', '', '2014-02-04 18:46:08');
INSERT INTO `tb_sirkit` VALUES ('676', '876', 'rusak', '21', '27', '1', '', '', '055DDFT_B09_03_14', '', '', '30N248', '6-52-2', '', '', '2014-02-04 18:46:08');
INSERT INTO `tb_sirkit` VALUES ('677', '877', 'rusak', '21', '19', '1', '', '', '', '', '', 'INT SGI', '1-30-2', '', '', '2014-02-04 18:46:08');
INSERT INTO `tb_sirkit` VALUES ('678', '878', 'rusak', '21', '19', '1', '', '', '', '', '', 'INT SGI', '5-56-2', '', '', '2014-02-04 18:46:08');
INSERT INTO `tb_sirkit` VALUES ('679', '879', 'rusak', '21', '19', '1', '', '', '', '', '', 'INT SGI', '5-58-2', '', '', '2014-02-04 18:46:08');
INSERT INTO `tb_sirkit` VALUES ('680', '880', 'rusak', '21', '19', '1', '', '', '', '', '', 'INT SGI', '5-59-2', '', '', '2014-02-04 18:46:08');
INSERT INTO `tb_sirkit` VALUES ('681', '881', 'rusak', '21', '19', '1', '', '', '', '', '', 'INT SGI', '5-61-3', '', '', '2014-02-04 18:46:09');
INSERT INTO `tb_sirkit` VALUES ('682', '882', 'rusak', '21', '19', '1', '', '', '', '', '', 'INT SGI', '5-62-3', '', '', '2014-02-04 18:46:09');
INSERT INTO `tb_sirkit` VALUES ('683', '883', 'rusak', '21', '19', '1', '', '', '', '', '', 'INT SGI', '5-63-2', '', '', '2014-02-04 18:46:09');
INSERT INTO `tb_sirkit` VALUES ('684', '884', 'rusak', '21', '19', '1', '', '', '', '', '', 'INT SGI', '5-63-3', '', '', '2014-02-04 18:46:09');
INSERT INTO `tb_sirkit` VALUES ('685', '885', 'rusak', '21', '19', '1', '', '', '', '', '', 'INT SGI', '6-20-0', '', '', '2014-02-04 18:46:09');
INSERT INTO `tb_sirkit` VALUES ('686', '886', 'rusak', '21', '19', '1', '', '', '', '', '', 'INT SGI', '6-20-1', '', '', '2014-02-04 18:46:09');
INSERT INTO `tb_sirkit` VALUES ('687', '887', 'rusak', '21', '19', '1', '', '', '', '', '', 'INT SGI', '6-21-0', '', '', '2014-02-04 18:46:09');
INSERT INTO `tb_sirkit` VALUES ('688', '888', 'rusak', '21', '19', '1', '', '', '', '', '', 'INT SGI', '6-21-1', '', '', '2014-02-04 18:46:09');
INSERT INTO `tb_sirkit` VALUES ('689', '889', 'rusak', '21', '19', '1', '', '', '', '', '', 'INT SGI', '6-26-3', '', '', '2014-02-04 18:46:09');
INSERT INTO `tb_sirkit` VALUES ('690', '890', 'rusak', '21', '19', '1', '', '', '', '', '', 'INT SGI', '0-01-0', '', '', '2014-02-04 18:46:09');
INSERT INTO `tb_sirkit` VALUES ('691', '891', 'rusak', '21', '19', '1', '', '', '', '', '', 'INT SGI', '0-02-0', '', '', '2014-02-04 18:46:09');
INSERT INTO `tb_sirkit` VALUES ('692', '892', 'rusak', '21', '24', '1', '', '', 'CIC 32', '', '', 'INT SGI', '0-03-0', '', '', '2014-02-04 18:46:09');
INSERT INTO `tb_sirkit` VALUES ('693', '893', 'rusak', '21', '24', '1', '', '', 'CIC 33', '', '', 'INT SGI', '6-17-3', '', '', '2014-02-04 18:46:10');
INSERT INTO `tb_sirkit` VALUES ('694', '894', 'rusak', '21', '24', '1', '', '', 'CIC 34', '', '', 'INT SGI', '3-31-0', '', '', '2014-02-04 18:46:10');
INSERT INTO `tb_sirkit` VALUES ('695', '895', 'rusak', '21', '24', '1', '', '', 'CIC 35', '', '', 'INT SGI', '3-31-1', '', '', '2014-02-04 18:46:10');
INSERT INTO `tb_sirkit` VALUES ('696', '896', 'rusak', '21', '24', '1', '', '', 'CIC 36', '', '', 'INT SGI', '2-20-0', '', '', '2014-02-04 18:46:10');
INSERT INTO `tb_sirkit` VALUES ('697', '897', 'rusak', '21', '23', '1', '', '', '055DDFT_B08_08_18', '', '', 'INT SGI', '0-06-1', '', '', '2014-02-04 18:46:10');
INSERT INTO `tb_sirkit` VALUES ('698', '898', 'rusak', '21', '23', '1', '', '', '055DDFT_B08_08_19', '', '', 'INT SGI', '0-06-2', '', '', '2014-02-04 18:46:10');
INSERT INTO `tb_sirkit` VALUES ('699', '899', 'rusak', '21', '23', '1', '', '', '055DDFT_B08_08_20', '', '', 'INT SGI', '0-19-2', '', '', '2014-02-04 18:46:10');
INSERT INTO `tb_sirkit` VALUES ('700', '900', 'rusak', '21', '23', '1', '', '', '055DDFT_B08_08_21', '', '', 'INT SGI', '0-24-1', '', '', '2014-02-04 18:46:10');
INSERT INTO `tb_sirkit` VALUES ('701', '901', 'rusak', '21', '23', '1', '', '', '055DDFT_B09_01_20', '', '', 'INT SGI', '0-25-1', '', '', '2014-02-04 18:46:10');
INSERT INTO `tb_sirkit` VALUES ('702', '902', 'rusak', '21', '23', '1', '', '', '055DDFT_B09_01_21', '', '', 'INT SGI', '0-26-1', '', '', '2014-02-04 18:46:10');
INSERT INTO `tb_sirkit` VALUES ('703', '903', 'rusak', '6', '9', '1', '', '', '', 'T4_20', 'C03_04-20', '', '', '', 'WUHAN 4_1_13', '2014-02-04 18:46:10');
INSERT INTO `tb_sirkit` VALUES ('704', '904', 'rusak', '6', '19', '18', '', '', 'ROUTER LT 6_4', '', '', '', '', '', '', '2014-02-04 18:46:11');
INSERT INTO `tb_sirkit` VALUES ('705', '905', 'rusak', '6', '19', '18', '', '', 'ROUTER LT 6_5', '', '', '', '', '', '', '2014-02-04 18:46:11');
INSERT INTO `tb_sirkit` VALUES ('706', '906', 'rusak', '6', '19', '18', '', '', 'ROUTER LT 6_6', '', '', '', '', '', '', '2014-02-04 18:46:11');
INSERT INTO `tb_sirkit` VALUES ('707', '907', 'rusak', '6', '21', '1', '', '', '', '', 'T5_5', '', '', '', '', '2014-02-04 18:46:11');
INSERT INTO `tb_sirkit` VALUES ('708', '908', 'rusak', '21', '39', '1', '', '', '', '', '', 'OSAKA', '6-53-0', '', '', '2014-02-04 18:46:11');
INSERT INTO `tb_sirkit` VALUES ('709', '909', 'rusak', '6', '21', '1', '', '', '', '', 'T4_22', '', '', '', '', '2014-02-04 18:46:11');
INSERT INTO `tb_sirkit` VALUES ('710', '910', 'rusak', '6', '16', '5', '', '', '', '', 'S8_24', '', '', '', '', '2014-02-04 18:46:11');
INSERT INTO `tb_sirkit` VALUES ('711', '911', 'rusak', '20', '14', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:11');
INSERT INTO `tb_sirkit` VALUES ('712', '912', 'rusak', '20', '14', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:11');
INSERT INTO `tb_sirkit` VALUES ('713', '913', 'rusak', '21', '19', '11', '', '', '', '', 'P7_162', '', '', '', '', '2014-02-04 18:46:11');
INSERT INTO `tb_sirkit` VALUES ('714', '914', 'rusak', '21', '19', '11', '', '', '', '', 'P7_164', '', '', '', '', '2014-02-04 18:46:11');
INSERT INTO `tb_sirkit` VALUES ('715', '915', 'rusak', '26', '9', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:11');
INSERT INTO `tb_sirkit` VALUES ('716', '916', 'rusak', '26', '9', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:11');
INSERT INTO `tb_sirkit` VALUES ('717', '917', 'rusak', '26', '9', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:12');
INSERT INTO `tb_sirkit` VALUES ('718', '918', 'rusak', '21', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:12');
INSERT INTO `tb_sirkit` VALUES ('719', '919', 'rusak', '26', '9', '1', '', '', '', '', '', '', '', '', 'DEAKTIVASI', '2014-02-04 18:46:12');
INSERT INTO `tb_sirkit` VALUES ('720', '920', 'rusak', '26', '9', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:12');
INSERT INTO `tb_sirkit` VALUES ('721', '921', 'rusak', '6', '9', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:12');
INSERT INTO `tb_sirkit` VALUES ('722', '922', 'rusak', '6', '19', '1', '', '', '', '', '', '', '', '', '', '2014-02-04 18:46:12');
INSERT INTO `tb_sirkit` VALUES ('723', '923', 'rusak', '6', '19', '3', '', '', '', '', '', 'NEWMON MATARAM', '', '', '', '2014-02-04 18:46:12');
INSERT INTO `tb_sirkit` VALUES ('724', '924', 'rusak', '15', '21', '5', '', '', 'ALC5_1_20', 'D02_05_20', '', '', '', '', '', '2014-02-04 18:46:12');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('1', 'idle', 'idle');
INSERT INTO `tb_user` VALUES ('2', 'sti', 'sti');
INSERT INTO `tb_user` VALUES ('3', 'mumed', 'mumed');
INSERT INTO `tb_user` VALUES ('4', 'gaharu', 'gaharu');
INSERT INTO `tb_user` VALUES ('5', 'telkomsel', 'telkomsel');
INSERT INTO `tb_user` VALUES ('6', 'c s m', 'c s m');
INSERT INTO `tb_user` VALUES ('7', 'city bank', 'city bank');
INSERT INTO `tb_user` VALUES ('8', 'tc', 'tc');
INSERT INTO `tb_user` VALUES ('9', 'trunk', 'trunk');
INSERT INTO `tb_user` VALUES ('10', 'isi', 'isi');
INSERT INTO `tb_user` VALUES ('11', 'flexi', 'flexi');
INSERT INTO `tb_user` VALUES ('12', 'stp', 'stp');
INSERT INTO `tb_user` VALUES ('13', 'cdc', 'cdc');
INSERT INTO `tb_user` VALUES ('14', 'is sentre', 'is sentre');
INSERT INTO `tb_user` VALUES ('15', 'csm', 'csm');
INSERT INTO `tb_user` VALUES ('16', 'no.conect', 'no.conect');
INSERT INTO `tb_user` VALUES ('17', 'telin', 'telin');
INSERT INTO `tb_user` VALUES ('18', 'xot', 'xot');
