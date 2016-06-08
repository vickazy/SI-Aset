-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2016 at 11:38 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `si_aset`
--

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE IF NOT EXISTS `aset` (
  `kode_aseta` varchar(255) NOT NULL,
  `i` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`kode_aseta`, `i`) VALUES
('', 3);

-- --------------------------------------------------------

--
-- Table structure for table `data_aset`
--

CREATE TABLE IF NOT EXISTS `data_aset` (
`i` int(11) NOT NULL,
  `kode` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_usul` int(11) NOT NULL,
  `id_users` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `cek` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `data_aset`
--

INSERT INTO `data_aset` (`i`, `kode`, `id_jenis`, `id_usul`, `id_users`, `kondisi`, `status`, `cek`) VALUES
(21, 1, 4, 42, 'NIP', 'Baik', 1, 0),
(23, 1, 5, 45, 'jurusan', 'Rusak Ringan', 0, 0),
(24, 2, 5, 44, 'jurusan', 'Baik', 0, 1),
(25, 1, 1, 43, 'jurusan', 'Baik', 0, 0),
(26, 3, 5, 46, 'L-01', 'Baik', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_aset`
--

CREATE TABLE IF NOT EXISTS `jenis_aset` (
`id_jenis` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `jenis_aset`
--

INSERT INTO `jenis_aset` (`id_jenis`, `jenis`) VALUES
(1, 'PC'),
(2, 'ATK'),
(3, 'AM'),
(4, 'K'),
(5, 'P');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_aset`
--

CREATE TABLE IF NOT EXISTS `pengembalian_aset` (
`id_pengembalian` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `sanksi` int(11) NOT NULL,
  `waktu_pengembalian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `pengembalian_aset`
--

INSERT INTO `pengembalian_aset` (`id_pengembalian`, `id_pinjam`, `sanksi`, `waktu_pengembalian`) VALUES
(17, 39, 0, '2016-06-07 21:42:50'),
(18, 40, 3000, '2016-06-08 03:53:38'),
(19, 41, 0, '2016-06-08 06:23:24'),
(20, 42, 2000, '2016-06-08 09:31:50');

-- --------------------------------------------------------

--
-- Table structure for table `pengusulan`
--

CREATE TABLE IF NOT EXISTS `pengusulan` (
`id_usul` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_pasaran` varchar(255) NOT NULL,
  `jumlah_barang` varchar(255) NOT NULL,
  `total_biaya` varchar(255) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `waktu_pengusulan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `ceknotif` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `pengusulan`
--

INSERT INTO `pengusulan` (`id_usul`, `id_user`, `nama_barang`, `harga_pasaran`, `jumlah_barang`, `total_biaya`, `spesifikasi`, `merk`, `gambar`, `keterangan`, `waktu_pengusulan`, `status`, `ceknotif`) VALUES
(42, 'NIP', 'Sepeda', 'Rp. 5.000.0000', '1 unit', 'Rp. 5.000.0000', 'Sepeda Balap', 'BMX', '12179254_1928021810755290_1643582361_n.jpg', 'Beli di buka lapak ', '2016-06-06 22:55:25', 1, 2),
(43, 'NIP', 'Komputer', 'Rp. 3.500.000', '2', 'Rp. 7.000.000', 'Intel Core i3', 'Asus', '10410676_727565130658952_4311091354120567872_n.jpg', 'Lazada', '2016-06-06 22:57:57', 1, 2),
(44, 'NIP', 'Sapu', 'Rp. 120.000', '1 buah', 'Rp. 120.000', 'Sapu anti kotor', 'COSMOS', 'Jellyfish.jpg', 'beli di jepang', '2016-06-06 23:13:03', 1, 2),
(45, 'NIP', 'Vacum Cleaner', 'Rp. 3.500.000', '1 buah', 'Rp. 3.500.000', 'Vacum penghisap debu', 'COSMOS', 'h1.png', 'beli di jepang', '2016-06-06 23:18:33', 1, 2),
(46, 'L-01', 'Rak Buku', 'Rp. 1.500.000', '2 buah', 'Rp. 3.000.000', 'Rak Buku tak penuh-penuh', 'FUTURA', 'fog.jpg', 'lalal', '2016-06-07 15:48:25', 1, 2),
(47, '2020', 'HP', 'Rp. 1.500.000', '1', 'Rp. 1.500.000', 'Tahan Air', 'Asus', '11998111_1114038151960227_1457404401_n.jpg', 'qwwqqw', '2016-06-08 09:30:36', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `perpindahan`
--

CREATE TABLE IF NOT EXISTS `perpindahan` (
`id_perpindahan` int(11) NOT NULL,
  `i` int(11) NOT NULL,
  `status_transfer` varchar(255) NOT NULL,
  `id_pengirim` varchar(255) NOT NULL,
  `id_penerima` varchar(255) NOT NULL,
  `waktu_transfer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `perpindahan`
--

INSERT INTO `perpindahan` (`id_perpindahan`, `i`, `status_transfer`, `id_pengirim`, `id_penerima`, `waktu_transfer`) VALUES
(3, 21, '1', '001', ' 2020', '2016-06-08 03:06:13'),
(4, 23, '0', '001', ' L-01', '2016-06-08 03:14:31'),
(7, 24, '0', '001', ' NIP', '2016-06-08 09:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_aset`
--

CREATE TABLE IF NOT EXISTS `pinjam_aset` (
`id_pinjam` int(11) NOT NULL,
  `id_peminjam` varchar(255) NOT NULL,
  `i` int(11) NOT NULL,
  `waktu_pinjam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `denda` int(11) NOT NULL,
  `lunas` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `pinjam_aset`
--

INSERT INTO `pinjam_aset` (`id_pinjam`, `id_peminjam`, `i`, `waktu_pinjam`, `denda`, `lunas`) VALUES
(39, 'L-01', 25, '2016-06-07 15:48:55', 0, 1),
(40, '2020', 25, '2016-06-08 03:39:08', 3000, 1),
(41, 'NIP', 24, '2016-06-08 03:39:48', 0, 1),
(42, 'NIP', 25, '2016-06-08 03:55:08', 2000, 1),
(43, '2020', 24, '2016-06-08 05:16:24', 0, 0),
(44, '2020', 24, '2016-06-08 09:31:13', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `telp`, `email`, `tipe`, `password`) VALUES
('001', 'yosi', '1', '1', 'admin', 'dc5c7986daef50c1e02ab09b442ee34f'),
('2020', 'La', '909', 'uhduhuh', 'mahasiswa', '7b7a53e239400a13bd6be6c91c4f6c4e'),
('L-01', 'Laboratory of Geographic Information System', '0', 'labgis@gmail.com', 'unit', 'fa172f348b34448621eab4891ad0593b'),
('NIP', 'Pak Dosen', '1', 'pakdosen@gmail.com', 'dosen', 'ce28eed1511f631af6b2a7bb0a85d636');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
 ADD PRIMARY KEY (`kode_aseta`);

--
-- Indexes for table `data_aset`
--
ALTER TABLE `data_aset`
 ADD PRIMARY KEY (`i`);

--
-- Indexes for table `jenis_aset`
--
ALTER TABLE `jenis_aset`
 ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `pengembalian_aset`
--
ALTER TABLE `pengembalian_aset`
 ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `pengusulan`
--
ALTER TABLE `pengusulan`
 ADD PRIMARY KEY (`id_usul`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `perpindahan`
--
ALTER TABLE `perpindahan`
 ADD PRIMARY KEY (`id_perpindahan`), ADD UNIQUE KEY `kode_aset` (`id_penerima`), ADD KEY `id_pengirim_aset` (`id_pengirim`);

--
-- Indexes for table `pinjam_aset`
--
ALTER TABLE `pinjam_aset`
 ADD PRIMARY KEY (`id_pinjam`), ADD KEY `kode_barang` (`i`), ADD KEY `kode_aset` (`i`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_aset`
--
ALTER TABLE `data_aset`
MODIFY `i` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `jenis_aset`
--
ALTER TABLE `jenis_aset`
MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pengembalian_aset`
--
ALTER TABLE `pengembalian_aset`
MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pengusulan`
--
ALTER TABLE `pengusulan`
MODIFY `id_usul` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `perpindahan`
--
ALTER TABLE `perpindahan`
MODIFY `id_perpindahan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pinjam_aset`
--
ALTER TABLE `pinjam_aset`
MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
