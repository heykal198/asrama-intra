-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 25, 2016 at 06:12 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `asrama`
--

-- --------------------------------------------------------

--
-- Table structure for table `asrama`
--

CREATE TABLE IF NOT EXISTS `asrama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penempatan` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `asrama`
--

INSERT INTO `asrama` (`id`, `penempatan`) VALUES
(4, 'No. 416 APARTMENT VILLA MELAWATI'),
(6, 'No. 53, JALAN KSU 2/4B'),
(7, 'No. 14 TAMAN SRI BENDAHARA'),
(8, 'No. 21 JALAN BENDAHARA 7A'),
(9, 'No. 6 LORONG TERATAI 2/16'),
(10, 'No. 74 JALAN SULTAN IBRAHIM BERITA HARIAN'),
(11, 'No. 31, JALAN BENDAHARA 10/6'),
(12, 'No. 29 JALAN BENDAHARA 10/5'),
(13, 'No. 13 JALAN BENDAHARA 7'),
(17, 'No. 17 JALAN SRI BENDAHARA 1/1'),
(18, 'No. 15 JALAN BENDAHARA 9'),
(19, 'No. 11 JALAN BENDAHARA 9A');

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE IF NOT EXISTS `daftar` (
  `nama` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ic` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `jantina` varchar(50) NOT NULL,
  `kursus` varchar(50) NOT NULL,
  `penempatan` varchar(50) NOT NULL,
  `nama_penjaga` varchar(50) NOT NULL,
  `maklumat_penjaga` varchar(50) NOT NULL,
  `alamat_penjaga` varchar(50) NOT NULL,
  `tel_penjaga` varchar(50) NOT NULL,
  `masuk` varchar(50) NOT NULL,
  `keluar` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`nama`, `id`, `ic`, `tel`, `jantina`, `kursus`, `penempatan`, `nama_penjaga`, `maklumat_penjaga`, `alamat_penjaga`, `tel_penjaga`, `masuk`, `keluar`) VALUES
('jep', 4, '9802', '0113', 'LELAKI', 'SISTEM KOMPUTER', 'No. 215 APARTMENT VILLA MELAWATI', 'hah', 'haha', 'hahah', 'h11', '12/31/2015', '01/31/2016'),
('alang', 6, '9801', '1122', 'LELAKI', 'JURUTEKNIK ELEKTRIK', 'No. 53, JALAN KSU 2/4B', 'tterga', '121qw', 'wqq1212 3', '133', '2016-02-18', '2016-02-29');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_inventori`
--

CREATE TABLE IF NOT EXISTS `daftar_inventori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `senarai_inventori` varchar(50) NOT NULL,
  `penempatan` varchar(50) NOT NULL,
  `tarikh_masuk` varchar(50) NOT NULL,
  `tarikh_keluar` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `daftar_inventori`
--

INSERT INTO `daftar_inventori` (`id`, `senarai_inventori`, `penempatan`, `tarikh_masuk`, `tarikh_keluar`) VALUES
(4, 'kipas', 'No. 31, JALAN BENDAHARA 10/6', '12', '12'),
(5, 'taik', 'No. 416 APARTMENT VILLA MELAWATI', '02/01/2016', '02/29/2016');

-- --------------------------------------------------------

--
-- Table structure for table `jadual_rondaan`
--

CREATE TABLE IF NOT EXISTS `jadual_rondaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penempatan` varchar(100) NOT NULL,
  `tarikh` date NOT NULL,
  `masa` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jadual_rondaan`
--

INSERT INTO `jadual_rondaan` (`id`, `penempatan`, `tarikh`, `masa`) VALUES
(3, 'No. 416 APARTMENT VILLA MELAWATI', '2016-02-25', '23:00'),
(4, 'No. 53, JALAN KSU 2/4B', '2016-02-24', '20:00');

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE IF NOT EXISTS `kursus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kursus` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id`, `kursus`) VALUES
(4, 'IT-020-3:2013'),
(5, 'IT-020-4:2013'),
(6, 'FB-024-2:2012'),
(7, 'FB-024-3:2012'),
(8, 'FB-081-4:2012'),
(9, 'EE-320-2:2012'),
(10, 'EE-320-3:2012'),
(11, 'MP-060-2:2013'),
(12, 'MP-060-3:2013'),
(13, 'TA-011-1:2012'),
(14, 'TA-011-2:2012'),
(15, 'TA-011-3:2012'),
(16, 'ME-020-2:2012'),
(17, 'ME-020-2:2012'),
(18, 'ME-020-3:2012');

-- --------------------------------------------------------

--
-- Table structure for table `logmasuk`
--

CREATE TABLE IF NOT EXISTS `logmasuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `logmasuk`
--

INSERT INTO `logmasuk` (`id`, `username`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `senarai_peralatan`
--

CREATE TABLE IF NOT EXISTS `senarai_peralatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `peralatan` varchar(40) NOT NULL,
  `penempatan` varchar(110) NOT NULL,
  `kuantiti` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `senarai_peralatan`
--

INSERT INTO `senarai_peralatan` (`id`, `peralatan`, `penempatan`, `kuantiti`) VALUES
(1, 'kipas', 'No. 416 APARTMENT VILLA MELAWATI', '3');
