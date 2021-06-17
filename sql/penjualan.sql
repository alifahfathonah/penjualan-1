/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : penjualan

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2021-06-18 06:45:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `customer`
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(64) DEFAULT NULL,
  `alamat` varchar(64) DEFAULT NULL,
  `kota` varchar(64) DEFAULT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('2106120001', '5X', 'cx', '5x', '5x');
INSERT INTO `customer` VALUES ('2106130001', 'CUSTOMER', 'JL.', 'Kalbar', '021');

-- ----------------------------
-- Table structure for `obat`
-- ----------------------------
DROP TABLE IF EXISTS `obat`;
CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(64) DEFAULT NULL,
  `jenis_obat` varchar(64) DEFAULT NULL,
  `satuan` varchar(25) DEFAULT NULL,
  `kategori` varchar(25) DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `harga_beli` double DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `stok` int(5) DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=2106150002 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of obat
-- ----------------------------
INSERT INTO `obat` VALUES ('2106130001', 'OK', 'OK', 'Box', 'Fast Moving', '2021-06-13', '20000', '30000', '0', '2106130002');
INSERT INTO `obat` VALUES ('2106130002', 'X', 'XX', 'Pcs', 'Fast Moving', '2021-06-13', '1', '2', '2', '2106130002');
INSERT INTO `obat` VALUES ('2106130003', 'BENER', 'BENER', 'Carton', 'Dead Stock', '2021-06-30', '10', '20', null, '2106130002');
INSERT INTO `obat` VALUES ('2106150001', 'DASD', 'DA', 'Pcs', 'Fast Moving', '2021-06-15', '1000', '2000', '10', '2106130003');

-- ----------------------------
-- Table structure for `pegawai`
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(64) DEFAULT NULL,
  `jabatan` varchar(25) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=2106130004 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pegawai
-- ----------------------------
INSERT INTO `pegawai` VALUES ('2106130001', 'DAS', 'dasd', 'sad', null, 'DA@SDA', 'das', '2a6571da26602a67be14ea8c5ab82349');
INSERT INTO `pegawai` VALUES ('2106130003', 'DSD 1', 'asdasd 1', 'sdasd 1', 'asda 1ee', 'ASD@DASDA1.COM', 'sdasd 1', 'c4ca4238a0b923820dcc509a6f75849b');

-- ----------------------------
-- Table structure for `pembelian`
-- ----------------------------
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_pembelian` date DEFAULT NULL,
  `jam_pembelian` time DEFAULT NULL,
  `grand_total` double DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=2106160002 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pembelian
-- ----------------------------
INSERT INTO `pembelian` VALUES ('2106150001', '2021-06-15', null, '20002', '2106130002', 'Done');
INSERT INTO `pembelian` VALUES ('2106150002', '2021-06-16', '06:39:00', '10000', '2106130003', 'Done');
INSERT INTO `pembelian` VALUES ('2106160001', '2021-06-16', null, null, '2106130002', 'Proses');

-- ----------------------------
-- Table structure for `penjualan`
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_penjualan` date DEFAULT NULL,
  `jam_penjualan` time DEFAULT NULL,
  `grand_total` double DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_penjualan`)
) ENGINE=InnoDB AUTO_INCREMENT=2106160007 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of penjualan
-- ----------------------------
INSERT INTO `penjualan` VALUES ('2106160001', '2021-06-16', '08:51:00', null, '2106120001', 'Done');
INSERT INTO `penjualan` VALUES ('2106160002', '2021-06-16', '09:03:00', '2', '2106120001', 'Proses');
INSERT INTO `penjualan` VALUES ('2106160003', '2021-06-16', '09:08:00', '0', '2106120001', 'Done');
INSERT INTO `penjualan` VALUES ('2106160004', null, null, null, null, 'Proses');
INSERT INTO `penjualan` VALUES ('2106160005', null, null, null, null, 'Proses');
INSERT INTO `penjualan` VALUES ('2106160006', null, null, null, null, 'Proses');

-- ----------------------------
-- Table structure for `resep`
-- ----------------------------
DROP TABLE IF EXISTS `resep`;
CREATE TABLE `resep` (
  `id_resep` int(11) NOT NULL AUTO_INCREMENT,
  `no_resep` varchar(64) DEFAULT NULL,
  `tanggal_resep` date DEFAULT NULL,
  `dokter` varchar(64) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  `id_penjualan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_resep`)
) ENGINE=InnoDB AUTO_INCREMENT=2106160002 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of resep
-- ----------------------------
INSERT INTO `resep` VALUES ('2106160001', '123', '2021-06-16', '123', '123', '2106160002');

-- ----------------------------
-- Table structure for `supplier`
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(64) DEFAULT NULL,
  `alamat` varchar(64) DEFAULT NULL,
  `kota` varchar(64) DEFAULT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=2106130004 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES ('2106130002', 'RXx', 'rxx', 'rxx', 'rxx');
INSERT INTO `supplier` VALUES ('2106130003', 'AA', 'a', 'aa', 'a');

-- ----------------------------
-- Table structure for `transaksi_pembelian`
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_pembelian`;
CREATE TABLE `transaksi_pembelian` (
  `id_detail_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `id_obat` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `id_pembelian` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detail_masuk`)
) ENGINE=InnoDB AUTO_INCREMENT=2106150004 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi_pembelian
-- ----------------------------
INSERT INTO `transaksi_pembelian` VALUES ('2106150001', '2106130001', '20000', '1', '20000', '2106150001');
INSERT INTO `transaksi_pembelian` VALUES ('2106150002', '2106130002', '1', '2', '2', '2106150001');
INSERT INTO `transaksi_pembelian` VALUES ('2106150003', '2106150001', '1000', '10', '10000', '2106150002');

-- ----------------------------
-- Table structure for `transaksi_penjualan`
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_penjualan`;
CREATE TABLE `transaksi_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `id_obat` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `id_penjualan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detail_penjualan`)
) ENGINE=InnoDB AUTO_INCREMENT=2106160004 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi_penjualan
-- ----------------------------
INSERT INTO `transaksi_penjualan` VALUES ('2106160001', '2106130001', '30000', '1', '30000', '2106160001');
INSERT INTO `transaksi_penjualan` VALUES ('2106160002', '2106130002', '2', '1', '2', '2106160002');
INSERT INTO `transaksi_penjualan` VALUES ('2106160003', '2106130002', '2', '1', '2', '2106160003');
