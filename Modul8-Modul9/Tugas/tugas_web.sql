-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2020 at 02:04 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `harga`) VALUES
(1, 'jamu', 55, 1000),
(2, 'Daun', 4, 100),
(3, 'sikat', 7, 1000),
(4, 'odol', 100, 2000),
(5, 'batu', 17, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `jual_beli`
--

CREATE TABLE `jual_beli` (
  `id_jualbeli` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl` varchar(50) NOT NULL,
  `jenis` varchar(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jual_beli`
--

INSERT INTO `jual_beli` (`id_jualbeli`, `id_barang`, `tgl`, `jenis`, `jumlah`, `total_harga`) VALUES
(1, 5, '2-April-2020', 'beli', 50, 50000),
(10, 5, '3-April-2020', 'jual', 12, 24000);

--
-- Triggers `jual_beli`
--
DELIMITER $$
CREATE TRIGGER `triger_jual` AFTER INSERT ON `jual_beli` FOR EACH ROW BEGIN
UPDATE barang
SET stok = stok - NEW.jumlah
WHERE id_barang = NEW.id_barang and NEW.jenis = 'jual';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `triger_pembelian` AFTER INSERT ON `jual_beli` FOR EACH ROW BEGIN
UPDATE barang
SET stok = stok + NEW.jumlah
WHERE id_barang = NEW.id_barang and NEW.jenis = 'beli';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
('pengguna', '8b097b8a86f9d6a991357d40d3d58634', 'Pengguna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `jual_beli`
--
ALTER TABLE `jual_beli`
  ADD PRIMARY KEY (`id_jualbeli`),
  ADD KEY `fk_barang` (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jual_beli`
--
ALTER TABLE `jual_beli`
  MODIFY `id_jualbeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jual_beli`
--
ALTER TABLE `jual_beli`
  ADD CONSTRAINT `fk_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
