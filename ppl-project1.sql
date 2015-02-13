-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2015 at 06:49 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ppl-project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE IF NOT EXISTS `keluhan` (
`id` int(11) NOT NULL,
  `nama_pelapor` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deskripsi` text NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '0',
  `kategori_id` int(11) NOT NULL,
  `foto` mediumblob,
  `taman_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keluhan_kategori`
--

CREATE TABLE IF NOT EXISTS `keluhan_kategori` (
`id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `deskripsi` text
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluhan_kategori`
--

INSERT INTO `keluhan_kategori` (`id`, `nama`, `deskripsi`) VALUES
(1, 'Fasilitas', 'Terdapat kerusakan/bagian yang hilang pada fasilitas taman, seperti lampu, kursi, toilet, pagar, patung, dan tanaman'),
(2, 'Kebersihan', 'Terdapat kotoran atau sampah yang bertebaran di taman, dan tidak ada petugas di sekitar');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan_status`
--

CREATE TABLE IF NOT EXISTS `keluhan_status` (
`id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `deskripsi` text
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluhan_status`
--

INSERT INTO `keluhan_status` (`id`, `nama`, `deskripsi`) VALUES
(1, 'Belum diverifikasi', 'Laporan belum diperiksa oleh admin.'),
(2, 'Sudah diverifikasi', 'Laporan sudah diperiksa oleh admin dan dinyatakan valid.'),
(3, 'Ditolak', 'Laporan sudah diperiksa oleh admin dan dinyatakan tidak valid');

-- --------------------------------------------------------

--
-- Table structure for table `taman`
--

CREATE TABLE IF NOT EXISTS `taman` (
`id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `lokasi` point NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluhan_kategori`
--
ALTER TABLE `keluhan_kategori`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluhan_status`
--
ALTER TABLE `keluhan_status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taman`
--
ALTER TABLE `taman`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `nama` (`nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `keluhan_kategori`
--
ALTER TABLE `keluhan_kategori`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `keluhan_status`
--
ALTER TABLE `keluhan_status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `taman`
--
ALTER TABLE `taman`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
