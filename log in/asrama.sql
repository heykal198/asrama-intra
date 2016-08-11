-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2016 at 06:19 PM
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
-- Table structure for table `aduan`
--

CREATE TABLE IF NOT EXISTS `aduan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `tarikh` varchar(100) NOT NULL,
  `penempatan` varchar(100) NOT NULL,
  `komen` text NOT NULL,
  `tindakan` varchar(30) NOT NULL,
  `komen_admin` text NOT NULL,
  `ic` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `aduan`
--

INSERT INTO `aduan` (`ID`, `nama`, `tarikh`, `penempatan`, `komen`, `tindakan`, `komen_admin`, `ic`) VALUES
(14, 'Muhd afiq Bin Ramli', '07/15/2016', 'No. 11 JALAN 17 TAMAN PADUKA', 'lampu losak .tingkap pilicah,tandas tisumbat', 'TIDAK DILAKSANAKAN', 'MAAF', '981129435381'),
(15, 'Muhammad Haikal Bin Mohd Ashaari', '07/07/2016', 'No. 416 APARTMENT VILLA MELAWATI', 'tingkap pecah, paip air tersumbat', 'DALAM PROSES', '', '981101106113'),
(16, 'Arief Noor Danish Bin Rozaimi', '07/01/2016', 'No. 6 LORONG TERATAI 2/16', 'pintu pecah', '', '', '971166779911'),
(17, 'Nazirul Mubin Bin zulkifle', '07/02/2016', 'No. 215 APARTMENT VILLA MELAWATI', 'paip bocor', '', '', '960718776511'),
(18, 'Muhammad Haziq Akmal bin Ismail', '07/03/2016', 'No. 416 APARTMENT VILLA MELAWATI', 'tingkap xda', '', '', '9877110161');

-- --------------------------------------------------------

--
-- Table structure for table `ajax_example`
--

CREATE TABLE IF NOT EXISTS `ajax_example` (
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `wpm` int(11) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ajax_example`
--

INSERT INTO `ajax_example` (`name`, `age`, `sex`, `wpm`) VALUES
('Frank', 45, 'm', 87),
('Jerry', 120, 'm', 20),
('Jill', 22, 'f', 72),
('Julie', 35, 'f', 90),
('Regis', 75, 'm', 44),
('Tracy', 27, 'f', 0);

-- --------------------------------------------------------

--
-- Table structure for table `asrama`
--

CREATE TABLE IF NOT EXISTS `asrama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penempatan` varchar(10000) NOT NULL,
  `total` varchar(50) NOT NULL,
  PRIMARY KEY (`id`,`total`(12))
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `asrama`
--

INSERT INTO `asrama` (`id`, `penempatan`, `total`) VALUES
(1, 'No. 214 APARTMENT VILLA MELAWATI', ''),
(2, 'No. 215 APARTMENT VILLA MELAWATI', ''),
(3, 'No. 315 APARTMENT VILLA MELAWATI', ''),
(4, 'No. 416 APARTMENT VILLA MELAWATI', ''),
(5, 'No. 11 JALAN 17 TAMAN PADUKA', ''),
(6, 'No. 53, JALAN KSU 2/4B', ''),
(7, 'No. 14 TAMAN SRI BENDAHARA', ''),
(8, 'No. 21 JALAN BENDAHARA 7A', ''),
(9, 'No. 6 LORONG TERATAI 2/16', ''),
(10, 'No. 74 JALAN SULTAN IBRAHIM ', ''),
(11, 'No. 31, JALAN BENDAHARA 10/6', ''),
(12, 'No. 29 JALAN BENDAHARA 10/5', ''),
(13, 'No. 13 JALAN BENDAHARA 7', ''),
(17, 'No. 17 JALAN SRI BENDAHARA 1/1', ''),
(18, 'No. 15 JALAN BENDAHARA 9', ''),
(19, 'No. 11 JALAN BENDAHARA 9A', '');

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE IF NOT EXISTS `bayar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `ic` varchar(50) NOT NULL,
  `penempatan` varchar(50) NOT NULL,
  `laksana` varchar(50) NOT NULL,
  `bayaran` varchar(50) NOT NULL,
  `tarikh_bayar` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id`, `nama`, `ic`, `penempatan`, `laksana`, `bayaran`, `tarikh_bayar`) VALUES
(1, 'Muhammad Haikal Bin Mohd Ashaari', '981101106113', 'No. 416 APARTMENT VILLA MELAWATI', 'Rm 60', 'Rm 60', '2016-06-01'),
(11, 'Muhammad Haziq Akmal bin Ismail', '9877110161', 'No. 416 APARTMENT VILLA MELAWATI', '2 bulan', 'RM 60', '2016-07-07'),
(12, 'Muhammad Haziq Akmal bin Ismail', '9877110161', 'No. 416 APARTMENT VILLA MELAWATI', '3 bulan', 'RM 70', '2016-07-07'),
(13, 'Muhammad Haziq Akmal bin Ismail', '9877110161', 'No. 416 APARTMENT VILLA MELAWATI', '4 bulan', 'RM 80', '2016-07-22'),
(14, 'Muhammad Haikal Bin Mohd Ashaari', '981101106113', 'No. 416 APARTMENT VILLA MELAWATI', 'Rm 80', 'Rm 70', '2016-06-08'),
(15, 'Muhammad Haikal Bin Mohd Ashaari', '981101106113', 'No. 416 APARTMENT VILLA MELAWATI', '', 'RM 68', '2016-06-08'),
(16, 'Muhammad Haikal Bin Mohd Ashaari', '981101106113', 'No. 416 APARTMENT VILLA MELAWATI', '', 'Rm 90', '2016-06-30'),
(17, 'Muhammad Haikal Bin Mohd Ashaari', '981101106113', 'No. 416 APARTMENT VILLA MELAWATI', '', 'Rm 70', '2016-06-01'),
(18, 'Muhammad Haikal Bin Mohd Ashaari', '981101106113', 'No. 416 APARTMENT VILLA MELAWATI', '', 'Rm 0000', '2016-06-20'),
(19, 'Loges', '975576565412', 'No. 215 APARTMENT VILLA MELAWATI', '', 'Rm 60', '2016-07-01'),
(20, 'Loges', '975576565412', 'No. 215 APARTMENT VILLA MELAWATI', '', 'Rm 120', '2016-07-01'),
(21, 'Loges', '975576565412', 'No. 215 APARTMENT VILLA MELAWATI', '', 'Rm 180', '2016-07-30'),
(22, 'Loges', '975576565412', 'No. 215 APARTMENT VILLA MELAWATI', '', 'Rm 240', '2016-07-12'),
(23, 'Muhammad Haikal Bin Mohd Ashaari', '981101106113', 'No. 416 APARTMENT VILLA MELAWATI', '', 'Rm 90', '2016-06-21'),
(24, 'Muhammad Haikal Bin Mohd Ashaari', '981101106113', 'No. 416 APARTMENT VILLA MELAWATI', '', 'Rm 60', '2016-06-20'),
(25, 'Muhammad Haikal Bin Mohd Ashaari', '981101106113', 'No. 416 APARTMENT VILLA MELAWATI', '', 'Rm 8000', '2016-06-20'),
(26, 'Muhammad Haziq Akmal bin Ismail', '9877110161', 'No. 416 APARTMENT VILLA MELAWATI', '', 'RM 90', '2016-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE IF NOT EXISTS `daftar` (
  `nama` varchar(50) NOT NULL,
  `bayaran` varchar(20) NOT NULL,
  `laksana` varchar(30) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ic` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `jantina` varchar(50) NOT NULL,
  `kursus` varchar(50) NOT NULL,
  `penempatan` varchar(50) NOT NULL,
  `nama_penjaga` varchar(50) NOT NULL,
  `nama_penjaga2` varchar(50) NOT NULL,
  `alamat_penjaga` varchar(1000) NOT NULL,
  `tel_penjaga` varchar(50) NOT NULL,
  `tel_penjaga2` varchar(30) NOT NULL,
  `masuk` varchar(50) NOT NULL,
  `keluar` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `aduan` text NOT NULL,
  `tarikh` varchar(20) NOT NULL,
  `tarikh_bayar` varchar(40) NOT NULL,
  `mail` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`nama`, `bayaran`, `laksana`, `id`, `ic`, `tel`, `jantina`, `kursus`, `penempatan`, `nama_penjaga`, `nama_penjaga2`, `alamat_penjaga`, `tel_penjaga`, `tel_penjaga2`, `masuk`, `keluar`, `pass`, `aduan`, `tarikh`, `tarikh_bayar`, `mail`) VALUES
('Muhammad Haikal Bin Mohd Ashaari', 'Rm 60', '1 Bulan', 24, '981101106113', '01000000000', 'LELAKI', 'IT-020-4:2013', 'No. 416 APARTMENT VILLA MELAWATI', 'Mohd Ashaari Bin Hussain', 'Norashikin Binti Mohd Nor', '14,06 Block C Jalan Pekaka 8/1 Gugusan Kesumbar Selangor,Malaysia', '0124256789', '0142356789', '03/03/2014', '12/31/2016', '123', 'LAMPU PECAH', '06/07/2016', '2016-06-08', ''),
('Nazirul Mubin Bin zulkifle', 'RM 60', '1 bulan', 25, '960718776511', '0128890900', 'LELAKI', 'MP-060-3:2013', 'No. 215 APARTMENT VILLA MELAWATI', 'zulkiflee bin zeman', 'azura binti seman', 'Kota Kemuning shah alam', '0199987789', '01655768878', '06/19/2016', '06/28/2016', '123', 'TAK ADA AIR ', '06/04/2016', '2016-06-01', ''),
('Muhd afiq Bin Ramli', 'Rm 60', 'Rm 120', 26, '981129435381', '0187789889', 'LELAKI', 'TA-012-2:2012', 'No. 11 JALAN 17 TAMAN PADUKA', 'Ramli ', 'Zakiah', 'sungai buloh selangor', '0108989989', '0187789989', '06/01/2016', '06/02/2016', '123', 'lampu pecah,tingkap tercabut,kayu patah', '06/15/2016', '2016-06-01', ''),
('Arief Noor Danish Bin Rozaimi', 'Rm 60', '1 Bulan', 27, '971166779911', '0112376789', 'LELAKI', 'ME-020-3-2012', 'No. 6 LORONG TERATAI 2/16', 'Rozaimi', '-', 'negeri sembilan', '01977657689', '-', '06/08/2016', '06/13/2016', '123', '', '', '', ''),
('Muhammad Haziq Akmal bin Ismail', 'Rm 120', '2 Bulan', 29, '9877110161', '0197786767', 'LELAKI', 'MP-060-3:2013', 'No. 416 APARTMENT VILLA MELAWATI', 'Ismail', '-', 'kedah ,MALAYSIA', '0199989898', '-', '06/01/2016', '06/30/2016', '123', '', '', '2016-06-28', ''),
('Muhammad Amirul Bin Yusdi', '', '', 33, '976627102281', '0166626262', 'LELAKI', 'IT-020-3:2013', 'No. 215 APARTMENT VILLA MELAWATI', 'Yusdi', '-', 'petaling jaya, selangor', '0177717171', '-', '07/01/2016', '07/31/2016', '123', '', '', '', ''),
('jombo', '', '', 35, '22222', '222', 'LELAKI', 'ME-020-2-2012', 'No. 11 JALAN 17 TAMAN PADUKA', '29292', '020022-', 's', 's', 'ss', '07/09/2016', '07/03/2016', 'sjsjs', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `logmasuk`
--

CREATE TABLE IF NOT EXISTS `logmasuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `logmasuk`
--

INSERT INTO `logmasuk` (`id`, `username`, `pass`) VALUES
(11, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `perempuan`
--

CREATE TABLE IF NOT EXISTS `perempuan` (
  `id` varchar(50) NOT NULL,
  `isnin_selasa_rabu_khamis` varchar(50) NOT NULL,
  `jumaat` varchar(50) NOT NULL,
  `sabtu` varchar(50) NOT NULL,
  `ahad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perempuan`
--

INSERT INTO `perempuan` (`id`, `isnin_selasa_rabu_khamis`, `jumaat`, `sabtu`, `ahad`) VALUES
('1', '4:30 p.m. sehingga 8:00 p.m.', '4:30 p.m. sehingga 10:00 p.m.', '8:00 a.m. sehingga 10:00 p.m.', '8:00 a.m. sehingga 9:00 p.m.');

-- --------------------------------------------------------

--
-- Table structure for table `warden_lelaki`
--

CREATE TABLE IF NOT EXISTS `warden_lelaki` (
  `nama` varchar(20) NOT NULL,
  `no_tel` varchar(20) NOT NULL,
  `ic` varchar(30) NOT NULL,
  `id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `warden_lelaki`
--

INSERT INTO `warden_lelaki` (`nama`, `no_tel`, `ic`, `id`) VALUES
(' En Abdul Faiz', '0102345562', '926618262122', 1),
('En Muhammad Farhan', '0168796541', '925167245682', 2),
(' En Kobinathan ', '0145698875', '917615373191', 3),
('Cik Puteri Syuhadah', '0172641339', '901152424212', 4),
('Cik Nor Hidayah', '01011118688', '935161836319', 5),
('Cik Noor Zakiah', '0196859693', '914252617181', 6),
('Cik Aini Afrida', '0147757878', '979907681611', 7),
('Cik Anis Liyanaa', '0187725262', '924351661717', 11);
