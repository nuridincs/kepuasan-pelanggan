# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.27)
# Database: db_kepuasan_pelanggan
# Generation Time: 2019-10-14 00:36:21 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tbl_admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `fullname` varchar(64) NOT NULL,
  `lastLogin` datetime DEFAULT NULL,
  `lastIp` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_admin` WRITE;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;

INSERT INTO `tbl_admin` (`idAdmin`, `username`, `password`, `email`, `fullname`, `lastLogin`, `lastIp`)
VALUES
	(1,'administrator','0192023a7bbd73250516f069df18b500','admin@gmail.com','Administrator','2019-10-13 00:26:59','127.0.0.1');

/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_customer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_customer`;

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `jk` varchar(15) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `frekuensi` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_customer` WRITE;
/*!40000 ALTER TABLE `tbl_customer` DISABLE KEYS */;

INSERT INTO `tbl_customer` (`id`, `nama`, `umur`, `jk`, `pekerjaan`, `frekuensi`)
VALUES
	(1,'ncs',23,'laki - laki','Pelajar','1 kali'),
	(2,'dwi',25,'perempuan','mahasiswa','1 kali'),
	(8,'eva',35,'Perempuan','Lainnya','Pertama Kali');

/*!40000 ALTER TABLE `tbl_customer` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_kuisioner_harapan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_kuisioner_harapan`;

CREATE TABLE `tbl_kuisioner_harapan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_responden` int(11) DEFAULT NULL,
  `p1` int(11) DEFAULT NULL,
  `p2` int(11) DEFAULT NULL,
  `p3` int(11) DEFAULT NULL,
  `p4` int(11) DEFAULT NULL,
  `p5` int(11) DEFAULT NULL,
  `p6` int(11) DEFAULT NULL,
  `p7` int(11) DEFAULT NULL,
  `p8` int(11) DEFAULT NULL,
  `p9` int(11) DEFAULT NULL,
  `p10` int(11) DEFAULT NULL,
  `p11` int(11) DEFAULT NULL,
  `p12` int(11) DEFAULT NULL,
  `p13` int(11) DEFAULT NULL,
  `p14` int(11) DEFAULT NULL,
  `p15` int(11) DEFAULT NULL,
  `p16` int(11) DEFAULT NULL,
  `p17` int(11) DEFAULT NULL,
  `p18` int(11) DEFAULT NULL,
  `p19` int(11) DEFAULT NULL,
  `p20` int(11) DEFAULT NULL,
  `p21` int(11) DEFAULT NULL,
  `p22` int(11) DEFAULT NULL,
  `p23` int(11) DEFAULT NULL,
  `p24` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_customer` (`id_responden`),
  CONSTRAINT `id_customer` FOREIGN KEY (`id_responden`) REFERENCES `tbl_customer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_kuisioner_harapan` WRITE;
/*!40000 ALTER TABLE `tbl_kuisioner_harapan` DISABLE KEYS */;

INSERT INTO `tbl_kuisioner_harapan` (`id`, `id_responden`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`, `p16`, `p17`, `p18`, `p19`, `p20`, `p21`, `p22`, `p23`, `p24`)
VALUES
	(3,1,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,5),
	(4,2,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4),
	(6,8,1,1,1,1,1,1,1,1,1,1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `tbl_kuisioner_harapan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_kuisioner_kenyataan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_kuisioner_kenyataan`;

CREATE TABLE `tbl_kuisioner_kenyataan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_responden` int(11) DEFAULT NULL,
  `p1` int(11) DEFAULT NULL,
  `p2` int(11) DEFAULT NULL,
  `p3` int(11) DEFAULT NULL,
  `p4` int(11) DEFAULT NULL,
  `p5` int(11) DEFAULT NULL,
  `p6` int(11) DEFAULT NULL,
  `p7` int(11) DEFAULT NULL,
  `p8` int(11) DEFAULT NULL,
  `p9` int(11) DEFAULT NULL,
  `p10` int(11) DEFAULT NULL,
  `p11` int(11) DEFAULT NULL,
  `p12` int(11) DEFAULT NULL,
  `p13` int(11) DEFAULT NULL,
  `p14` int(11) DEFAULT NULL,
  `p15` int(11) DEFAULT NULL,
  `p16` int(11) DEFAULT NULL,
  `p17` int(11) DEFAULT NULL,
  `p18` int(11) DEFAULT NULL,
  `p19` int(11) DEFAULT NULL,
  `p20` int(11) DEFAULT NULL,
  `p21` int(11) DEFAULT NULL,
  `p22` int(11) DEFAULT NULL,
  `p23` int(11) DEFAULT NULL,
  `p24` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY ` customer` (`id_responden`),
  CONSTRAINT ` customer` FOREIGN KEY (`id_responden`) REFERENCES `tbl_customer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_kuisioner_kenyataan` WRITE;
/*!40000 ALTER TABLE `tbl_kuisioner_kenyataan` DISABLE KEYS */;

INSERT INTO `tbl_kuisioner_kenyataan` (`id`, `id_responden`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`, `p16`, `p17`, `p18`, `p19`, `p20`, `p21`, `p22`, `p23`, `p24`)
VALUES
	(1,1,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5),
	(2,2,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5),
	(9,8,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1);

/*!40000 ALTER TABLE `tbl_kuisioner_kenyataan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_pernyataan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_pernyataan`;

CREATE TABLE `tbl_pernyataan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pernyataan` varchar(50) DEFAULT NULL,
  `skor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_pernyataan` WRITE;
/*!40000 ALTER TABLE `tbl_pernyataan` DISABLE KEYS */;

INSERT INTO `tbl_pernyataan` (`id`, `pernyataan`, `skor`)
VALUES
	(1,'Sangat Tidak Memuaskan',1),
	(2,'Tidak Memuaskan',2),
	(3,'Cukup Memuaskan',3),
	(4,'Memuaskan',4),
	(5,'Sangat Memuaskan',5);

/*!40000 ALTER TABLE `tbl_pernyataan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;

INSERT INTO `tbl_user` (`id`, `nama`, `email`, `password`, `role`)
VALUES
	(1,'admin','admin@gmail.com','test123',1);

/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_var_bukti_fisik
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_var_bukti_fisik`;

CREATE TABLE `tbl_var_bukti_fisik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_var` int(11) DEFAULT NULL,
  `pertanyaan` varchar(200) DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_var_bukti_fisik` WRITE;
/*!40000 ALTER TABLE `tbl_var_bukti_fisik` DISABLE KEYS */;

INSERT INTO `tbl_var_bukti_fisik` (`id`, `id_var`, `pertanyaan`, `keterangan`)
VALUES
	(1,5,'Restoran Foodwalk memiliki tempat yang nyaman','variabel bukti fisik'),
	(2,5,'Lokasi restoran Foodwalk mudah untuk di temukan','variabel bukti fisik'),
	(3,5,'Ruangan restoran Foodwalk memiliki dekorasi yang menarik','variabel bukti fisik'),
	(4,5,'Fasilitas pelengkap yang disediakan Restoran Foodwal ( kursi, meja, wastafel, dll ) bersih dan dalam keadaan baik','variabel bukti fisik'),
	(5,5,'Karyawan Restoran Foodwalk berpenampilan bersih dan rapih','variabel bukti fisik'),
	(6,5,'Peralatan dapur yang di gunakan restoran Foodwalk canggih','variabel bukti fisik'),
	(7,5,'Peralatan yang di gunakan Restoran Foodwalk bersih dan lengkap','variabel bukti fisik');

/*!40000 ALTER TABLE `tbl_var_bukti_fisik` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_var_daya_tanggap
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_var_daya_tanggap`;

CREATE TABLE `tbl_var_daya_tanggap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_var` int(11) NOT NULL,
  `pertanyaan` varchar(200) DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_var_daya_tanggap` WRITE;
/*!40000 ALTER TABLE `tbl_var_daya_tanggap` DISABLE KEYS */;

INSERT INTO `tbl_var_daya_tanggap` (`id`, `id_var`, `pertanyaan`, `keterangan`)
VALUES
	(1,2,'Saya tidak terlalu lama mengantri dalam memesan makanan ataupun minuman','variabel daya tanggap'),
	(2,2,'saya tidak terlalu lama menerima menu yang saya pesan','variabel daya tanggap'),
	(3,2,'Karyawan restoran Foodwalk tidak membiarkan anda berdiri lama ketika tempat penuh','variabel daya tanggap'),
	(4,2,'Ketika Anda membutuhkan sesuatu karyawan restoran Foodwalk memiliki waktu luang untuk membantu Anda','variabel daya tanggap');

/*!40000 ALTER TABLE `tbl_var_daya_tanggap` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_var_empati
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_var_empati`;

CREATE TABLE `tbl_var_empati` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_var` int(11) DEFAULT NULL,
  `pertanyaan` varchar(200) DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_var_empati` WRITE;
/*!40000 ALTER TABLE `tbl_var_empati` DISABLE KEYS */;

INSERT INTO `tbl_var_empati` (`id`, `id_var`, `pertanyaan`, `keterangan`)
VALUES
	(1,4,'Karyawan restoran Foodwalk memberikan perhatian secara individual kepada anda','variabel empati'),
	(2,4,'Karyawan restoran Foodwak memiliki kesungguhan dalam merespon permintaan anda','variabel empati'),
	(3,4,'Karyawan restoran foodwalk memberikan layanan yang sama tanpa memandang status social','variabel empati'),
	(4,4,'Restoran Fodwalk memiliki jam buka yang sesuai dengan keinginan anda','variabel empati');

/*!40000 ALTER TABLE `tbl_var_empati` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_var_jaminan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_var_jaminan`;

CREATE TABLE `tbl_var_jaminan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_var` int(11) DEFAULT NULL,
  `pertanyaan` varchar(200) DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_var_jaminan` WRITE;
/*!40000 ALTER TABLE `tbl_var_jaminan` DISABLE KEYS */;

INSERT INTO `tbl_var_jaminan` (`id`, `id_var`, `pertanyaan`, `keterangan`)
VALUES
	(1,3,'Karyawan Restoran Foodwalk memiliki pengetahuan tentang menu yang di pesan','variabel jaminan'),
	(2,3,'Restoran Foodwalk selalu menjaga kebersihan dan kesegaran makanan dan minuman','variabel jaminan'),
	(3,3,'Cita Rasa menu yang di sajikan restoran Foodwalk selalu sama setiap kali anda berkunjung','variabel jaminan'),
	(4,3,'Anda merasa aman dan nyaman pada saat berada di restoran foodwalk','variabel jaminan'),
	(5,3,'Karyawan Restoran Foodwalk selalu bersikap sopan dan sabar kepada anda','variabel jaminan');

/*!40000 ALTER TABLE `tbl_var_jaminan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_var_kehandalan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_var_kehandalan`;

CREATE TABLE `tbl_var_kehandalan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_var` int(11) DEFAULT NULL,
  `pertanyaan` varchar(200) DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_var_kehandalan` WRITE;
/*!40000 ALTER TABLE `tbl_var_kehandalan` DISABLE KEYS */;

INSERT INTO `tbl_var_kehandalan` (`id`, `id_var`, `pertanyaan`, `keterangan`)
VALUES
	(1,1,'Karyawan Restoran Foodwalk memiliki kemampuan dalam mengolah menu makanan dan minuman yang di sajikan','variabel kehandalan'),
	(2,1,'Karyawan Restoran Foodwalk cekatan dalam menangani kebutuhan akan pesanan Anda','variabel kehandalan'),
	(3,1,'Keakuratan perhitungan administrasi  oleh kasir Restoran Foodwalk pada saat anda membayar ','variabel kehandalan'),
	(4,1,'Restoran Foodwalk memberikan perhatian serius kepada Anda ketika tempat penuh','variabel kehandalan');

/*!40000 ALTER TABLE `tbl_var_kehandalan` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
