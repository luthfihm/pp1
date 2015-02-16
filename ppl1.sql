-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2015 at 03:26 AM
-- Server version: 5.5.38
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ppl1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE IF NOT EXISTS `instansi` (
`id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id`, `nama`, `email`) VALUES
(1, 'Dinas Pertamanan dan Pemakaman kota Bandung', 'luthfi_hamid_m@yahoo.co.id');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `deskripsi`) VALUES
(1, 'Pedagang Kaki Lima', ''),
(2, 'Kebersihan', ''),
(3, 'Keamanan', ''),
(5, 'Pengemis', '');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE IF NOT EXISTS `keluhan` (
`id` int(11) NOT NULL,
  `nama_pelapor` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `taman` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kategori` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `keluhan`
--

INSERT INTO `keluhan` (`id`, `nama_pelapor`, `email`, `waktu`, `taman`, `deskripsi`, `foto`, `kategori`, `status`, `read`) VALUES
(1, 'Luthfi', 'luthfi_hamid_m@yahoo.co.id', '2014-12-31 15:30:06', 1, 'Test', '20150211-233006.jpg', 1, 1, 1),
(3, 'Rifda', 'rifda@rifda.com', '2015-02-12 11:26:11', 1, 'Haha', '', 3, 1, 1),
(6, 'Luthfi', 'luthfi_hamid_m@arc.itb.ac.id', '2015-02-13 07:31:16', 1, 'Test aja', '20150213-153116.jpg', 3, 1, 1),
(8, 'Luthfi', 'luthfi_hamid_m@arc.itb.ac.id', '2015-02-13 07:54:30', 1, 'Test aja', '20150213-155430.jpg', 3, 1, 1),
(11, 'Luthfi', 'luthfi_hamid_m@arc.itb.ac.id', '2015-02-13 18:31:38', 3, 'Ih kotor', '20150214-023138.png', 2, 1, 1),
(12, 'Luthfi', 'luthfi_hamid_m@yahoo.co.id', '2015-02-16 19:08:53', 1, 'Test', '', 1, 1, 1),
(13, 'Luthfi', 'luthfi_hamid_m@yahoo.co.id', '2015-02-16 19:10:42', 1, 'Test', '20150217-031042.png', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `taman`
--

CREATE TABLE IF NOT EXISTS `taman` (
`id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `taman`
--

INSERT INTO `taman` (`id`, `nama`, `alamat`, `latitude`, `longitude`) VALUES
(1, 'Taman Dago', 'Jalan Juanda', -6.898721, 107.6126),
(2, 'Taman Ganesha', 'Jalan Ganesha', -6.893925, 107.610458),
(3, 'Taman Jomblo', 'Jembatan Pasopati', -6.898053, 107.609518),
(19, 'Taman Lansia', 'Jalan Diponegoro', -6.90187, 107.6231);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
 ADD PRIMARY KEY (`id`), ADD KEY `taman` (`taman`,`kategori`), ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `taman`
--
ALTER TABLE `taman`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `taman`
--
ALTER TABLE `taman`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `keluhan`
--
ALTER TABLE `keluhan`
ADD CONSTRAINT `keluhan_ibfk_1` FOREIGN KEY (`taman`) REFERENCES `taman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `keluhan_ibfk_2` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
