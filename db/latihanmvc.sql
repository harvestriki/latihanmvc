-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.11 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for perpus_project_db
CREATE DATABASE IF NOT EXISTS `perpus_project_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `perpus_project_db`;


-- Dumping structure for table perpus_project_db.m_anggota
CREATE TABLE IF NOT EXISTS `m_anggota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(65) NOT NULL,
  `user_id` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table perpus_project_db.m_anggota: ~4 rows (approximately)
/*!40000 ALTER TABLE `m_anggota` DISABLE KEYS */;
INSERT INTO `m_anggota` (`id`, `nama`, `email`, `user_id`, `password`, `jenis`) VALUES
	(1, 'riki', 'rikiari.mail@gmail.com', 'riki_ari', 'halobro', 'Admin'),
	(2, 'gani', 'gani@gmail.com', 'gani_wow', 'gani_wow', 'Anggota'),
	(7, 'hoey', 'hoey@gmail.com', 'hoey', '123456', 'Anggota'),
	(8, 'riki', 'kjk', 'jkjk', 'jkjk', 'Admin'),
	(9, 're', 're', 're', 're', 'Admin'),
	(10, 'reas', 're', 're', 're', 'Anggota');
/*!40000 ALTER TABLE `m_anggota` ENABLE KEYS */;


-- Dumping structure for table perpus_project_db.m_buku
CREATE TABLE IF NOT EXISTS `m_buku` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `JUDUL` int(150) NOT NULL,
  `PENERBIT` int(11) NOT NULL,
  `PENGARANG` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `PENERBIT` (`PENERBIT`),
  KEY `PENGARANG` (`PENGARANG`),
  CONSTRAINT `m_buku_ibfk_1` FOREIGN KEY (`PENERBIT`) REFERENCES `m_penerbit` (`ID`),
  CONSTRAINT `m_buku_ibfk_2` FOREIGN KEY (`PENGARANG`) REFERENCES `m_pengarang` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table perpus_project_db.m_buku: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_buku` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_buku` ENABLE KEYS */;


-- Dumping structure for table perpus_project_db.m_penerbit
CREATE TABLE IF NOT EXISTS `m_penerbit` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(50) NOT NULL,
  `ALAMAT` varchar(150) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table perpus_project_db.m_penerbit: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_penerbit` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_penerbit` ENABLE KEYS */;


-- Dumping structure for table perpus_project_db.m_pengarang
CREATE TABLE IF NOT EXISTS `m_pengarang` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(50) NOT NULL,
  `ALAMAT` varchar(150) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table perpus_project_db.m_pengarang: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_pengarang` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_pengarang` ENABLE KEYS */;


-- Dumping structure for table perpus_project_db.t_buku_pengarang
CREATE TABLE IF NOT EXISTS `t_buku_pengarang` (
  `BUKU` int(11) NOT NULL,
  `PENGARANG` int(11) NOT NULL,
  KEY `PENGARANG` (`PENGARANG`),
  CONSTRAINT `t_buku_pengarang_ibfk_1` FOREIGN KEY (`PENGARANG`) REFERENCES `m_pengarang` (`ID`),
  CONSTRAINT `t_buku_pengarang_ibfk_2` FOREIGN KEY (`PENGARANG`) REFERENCES `m_buku` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table perpus_project_db.t_buku_pengarang: ~0 rows (approximately)
/*!40000 ALTER TABLE `t_buku_pengarang` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_buku_pengarang` ENABLE KEYS */;


-- Dumping structure for table perpus_project_db.t_detail_transaksi
CREATE TABLE IF NOT EXISTS `t_detail_transaksi` (
  `TRANSAKSI` int(11) NOT NULL,
  `BUKU` int(11) NOT NULL,
  `TGL_KEMBALI` date NOT NULL,
  KEY `BUKU` (`BUKU`),
  KEY `TRANSAKSI` (`TRANSAKSI`),
  CONSTRAINT `t_detail_transaksi_ibfk_1` FOREIGN KEY (`BUKU`) REFERENCES `m_buku` (`ID`),
  CONSTRAINT `t_detail_transaksi_ibfk_2` FOREIGN KEY (`BUKU`) REFERENCES `m_buku` (`ID`),
  CONSTRAINT `t_detail_transaksi_ibfk_3` FOREIGN KEY (`TRANSAKSI`) REFERENCES `t_transaksi` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table perpus_project_db.t_detail_transaksi: ~0 rows (approximately)
/*!40000 ALTER TABLE `t_detail_transaksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_detail_transaksi` ENABLE KEYS */;


-- Dumping structure for table perpus_project_db.t_transaksi
CREATE TABLE IF NOT EXISTS `t_transaksi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TANGGAL` date NOT NULL,
  `ADMIN` int(11) NOT NULL,
  `ANGGOTA` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ADMIN` (`ADMIN`),
  KEY `ANGGOTA` (`ANGGOTA`),
  CONSTRAINT `t_transaksi_ibfk_1` FOREIGN KEY (`ADMIN`) REFERENCES `m_anggota` (`id`),
  CONSTRAINT `t_transaksi_ibfk_2` FOREIGN KEY (`ANGGOTA`) REFERENCES `m_anggota` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table perpus_project_db.t_transaksi: ~0 rows (approximately)
/*!40000 ALTER TABLE `t_transaksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_transaksi` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
