-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2016 at 05:13 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pemesanan_domain_hosting_uns`
--

-- --------------------------------------------------------

--
-- Table structure for table `aplikasi`
--

CREATE TABLE IF NOT EXISTS `aplikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(32) NOT NULL,
  `kode_detail_aplikasi` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kode_detail_aplikasi` (`kode_detail_aplikasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `aplikasi`
--

INSERT INTO `aplikasi` (`id`, `nama`, `kode_detail_aplikasi`) VALUES
(1, 'cms', 1),
(2, 'cms', 2),
(3, 'framework', 3),
(4, 'framework', 4),
(5, 'framework', 5),
(6, 'framework', 6),
(7, 'framework', 7),
(8, 'coding sendiri', 8),
(9, 'coding sendiri', 9),
(10, 'coding sendiri', 10);

-- --------------------------------------------------------

--
-- Table structure for table `detail_aplikasi`
--

CREATE TABLE IF NOT EXISTS `detail_aplikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `detail_aplikasi`
--

INSERT INTO `detail_aplikasi` (`id`, `nama`) VALUES
(1, 'wordpress'),
(2, 'joomla'),
(3, 'ci'),
(4, 'yii'),
(5, 'jango'),
(6, 'laravel'),
(7, 'spring'),
(8, 'php'),
(9, 'java'),
(10, 'pyton');

-- --------------------------------------------------------

--
-- Table structure for table `ketua`
--

CREATE TABLE IF NOT EXISTS `ketua` (
  `id_ketua` int(11) NOT NULL AUTO_INCREMENT,
  `NIP/NIM` varchar(100) NOT NULL,
  `nama_ketua` varchar(1000) NOT NULL,
  `kode_jabatan` int(11) NOT NULL,
  PRIMARY KEY (`id_ketua`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE IF NOT EXISTS `pendaftar` (
  `id_pendaftar` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pendaftar` varchar(500) NOT NULL,
  `email_pendaftar` varchar(500) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  PRIMARY KEY (`id_pendaftar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id_pendaftar`, `nama_pendaftar`, `email_pendaftar`, `no_hp`) VALUES
(1, '1', '1', '1'),
(2, '1', '1', '1'),
(3, '1', '1', '1'),
(4, '1', '1', '1'),
(5, '2', '3', '4'),
(6, '2', '3', '4');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE IF NOT EXISTS `permintaan` (
  `kode_permintaan` varchar(50) NOT NULL,
  `keperluan` varchar(1000) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `status` enum('pending','active') NOT NULL,
  `id_pendaftar` int(11) NOT NULL,
  `id_ketua` int(11) NOT NULL,
  `kode_surat` int(11) NOT NULL,
  `kode_jenis` enum('domain','hosting','domain dan hosting') NOT NULL,
  `kode_aplikasi` int(11) NOT NULL,
  PRIMARY KEY (`kode_permintaan`),
  KEY `id_pendaftar` (`id_pendaftar`),
  KEY `id_ketua` (`id_ketua`),
  KEY `kode_surat` (`kode_surat`),
  KEY `kode_aplikasi` (`kode_aplikasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE IF NOT EXISTS `surat` (
  `kode_surat` int(11) NOT NULL AUTO_INCREMENT,
  `kop_surat` varchar(1000) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `tebusan` varchar(100) NOT NULL,
  `persetujuan` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_surat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD CONSTRAINT `aplikasi_ibfk_1` FOREIGN KEY (`kode_detail_aplikasi`) REFERENCES `detail_aplikasi` (`id`);

--
-- Constraints for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD CONSTRAINT `permintaan_ibfk_4` FOREIGN KEY (`kode_aplikasi`) REFERENCES `aplikasi` (`id`),
  ADD CONSTRAINT `permintaan_ibfk_1` FOREIGN KEY (`id_pendaftar`) REFERENCES `pendaftar` (`id_pendaftar`),
  ADD CONSTRAINT `permintaan_ibfk_2` FOREIGN KEY (`id_ketua`) REFERENCES `ketua` (`id_ketua`),
  ADD CONSTRAINT `permintaan_ibfk_3` FOREIGN KEY (`kode_surat`) REFERENCES `surat` (`kode_surat`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
