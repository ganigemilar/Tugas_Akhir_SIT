-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2015 at 03:05 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sewa_kendaraan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `id_pelanggan` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `jenis_id` varchar(100) NOT NULL,
  `no_id` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_pelanggan`, `nama`, `jenis_kelamin`, `alamat`, `no_telp`, `jenis_id`, `no_id`) VALUES
(3, 'Gani Gemilar', 'Laki-laki', 'Jakarta', '2183013', 'Kartu Tanda Penduduk', '462834621639'),
(4, 'Eko Pikaso', 'Laki-laki', 'Tajur', '2183013', 'Kartu Tanda Penduduk', '462834621639'),
(5, 'Akbar', 'Laki-laki', 'Cilacap', '79021370', 'Kartu Tanda Penduduk', '29846918323'),
(6, 'fani fadilah', 'Perempuan', 'cimahi', '9901223', 'Kartu Tanda Penduduk', '970923123123'),
(7, 'Dhanar J', 'Laki-laki', 'cimahi', '79021370', 'Kartu Tanda Penduduk', '462834621639');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE IF NOT EXISTS `kendaraan` (
  `id_kendaraan` int(5) NOT NULL,
  `jenis_kendaraan` enum('Mobil','Motor') NOT NULL,
  `merek` varchar(30) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `no_polisi` varchar(30) NOT NULL,
  `tahun` int(4) NOT NULL,
  `biaya_sewa` int(30) NOT NULL,
  `status` enum('Disewa','Ada') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `jenis_kendaraan`, `merek`, `tipe`, `warna`, `no_polisi`, `tahun`, `biaya_sewa`, `status`) VALUES
(1, 'Mobil', 'Honda', 'Jazz', 'Merah', 'B 3546 VWE', 2013, 130000, '');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE IF NOT EXISTS `operator` (
  `id_operator` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id_operator`, `nama`, `jenis_kelamin`, `alamat`, `no_telp`, `username`, `password`) VALUES
(1, 'Gani Gemilar', 'Laki-laki', 'Tajur', '081328963154', 'gani.gemilar', 'gani');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_kembali`
--

CREATE TABLE IF NOT EXISTS `transaksi_kembali` (
  `id_kembali` int(5) NOT NULL,
  `id_sewa` int(5) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` int(30) NOT NULL,
  `kondisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_sewa`
--

CREATE TABLE IF NOT EXISTS `transaksi_sewa` (
  `id_sewa` int(5) NOT NULL,
  `id_pelanggan` int(5) NOT NULL,
  `id_kendaraan` int(5) NOT NULL,
  `id_operator` int(5) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indexes for table `transaksi_kembali`
--
ALTER TABLE `transaksi_kembali`
  ADD PRIMARY KEY (`id_kembali`);

--
-- Indexes for table `transaksi_sewa`
--
ALTER TABLE `transaksi_sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_pelanggan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaksi_sewa`
--
ALTER TABLE `transaksi_sewa`
  MODIFY `id_sewa` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
