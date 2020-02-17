-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 01:20 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` char(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `contact` varchar(13) NOT NULL,
  `bio` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `first_name`, `last_name`, `password`, `alamat`, `contact`, `bio`, `email`, `image`) VALUES
('A0001', 'Sugar', 'Muhammad', 'Taftazani Adi', 'fiend', 'Jl. Gorongan V', '085393051298', 'Information System', 'm.taftazani123@gmail.com', 'icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `detail_ekstra`
--

CREATE TABLE `detail_ekstra` (
  `id_ekstra` int(11) NOT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `basic` int(11) NOT NULL DEFAULT '0',
  `pm` int(11) NOT NULL DEFAULT '0',
  `pemakaian` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_ekstra`
--

INSERT INTO `detail_ekstra` (`id_ekstra`, `id_jenis`, `basic`, `pm`, `pemakaian`) VALUES
(62, 1, 1, 1, 0.5),
(62, 2, 1, 0, 0.1),
(62, 3, 0, 0, 0),
(62, 4, 0, 0, 0),
(62, 5, 0, 0, 0),
(62, 6, 0, 0, 0),
(63, 1, 0, 0, 0),
(63, 2, 0, 0, 0),
(63, 3, 0, 0, 0),
(63, 4, 0, 0, 0),
(63, 5, 0, 0, 0),
(63, 6, 0, 0, 0),
(64, 1, 0, 0, 4),
(64, 2, 0, 0, 1),
(64, 3, 0, 0, 0),
(64, 4, 0, 0, 0),
(64, 5, 0, 0, 0),
(64, 6, 0, 0, 0),
(65, 1, 0, 0, 0),
(65, 2, 0, 0, 0),
(65, 3, 0, 0, 0),
(65, 4, 0, 0, 0),
(65, 5, 0, 0, 0),
(65, 6, 0, 0, 0),
(66, 1, 0, 0, 0),
(66, 2, 0, 0, 0),
(66, 3, 0, 0, 0),
(66, 4, 0, 0, 0),
(66, 5, 0, 0, 0),
(66, 6, 0, 0, 0),
(67, 1, 0, 0, 0),
(67, 2, 0, 0, 0),
(67, 3, 0, 0, 0),
(67, 4, 0, 0, 0),
(67, 5, 0, 0, 0),
(67, 6, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penyajian`
--

CREATE TABLE `detail_penyajian` (
  `id_powder` int(11) NOT NULL,
  `id_penyajian` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penyajian`
--

INSERT INTO `detail_penyajian` (`id_powder`, `id_penyajian`, `harga`) VALUES
(53, 1, 12000),
(53, 2, 14000),
(53, 3, 10000),
(54, 1, 12000),
(54, 2, 14000),
(55, 1, 13000),
(55, 2, 15000),
(56, 1, 13000),
(56, 2, 15000),
(57, 1, 12000),
(57, 2, 14000),
(58, 4, 15000),
(59, 1, 12000),
(59, 2, 14000),
(60, 4, 15000),
(61, 2, 15000),
(61, 1, 13000),
(61, 3, 10000),
(56, 3, 10000),
(62, 4, 15000),
(63, 1, 13000),
(63, 2, 15000),
(64, 4, 15000),
(72, 1, 12000),
(72, 2, 14000),
(65, 1, 12000),
(65, 2, 14000),
(66, 1, 12000),
(66, 2, 14000),
(67, 1, 12000),
(67, 2, 14000),
(68, 1, 13000),
(68, 2, 15000),
(69, 1, 12000),
(69, 2, 14000),
(70, 1, 12000),
(70, 2, 14000),
(71, 1, 12000),
(71, 2, 14000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `no_nota` int(11) NOT NULL,
  `id_powder` int(11) NOT NULL,
  `id_penyajian` int(11) DEFAULT NULL,
  `id_topping` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`no_nota`, `id_powder`, `id_penyajian`, `id_topping`, `jumlah`, `id_region`) VALUES
(10, 54, 1, 26, 15000, 1),
(10, 53, 2, NULL, 14000, 1),
(11, 53, 2, 24, 17000, 1),
(12, 59, 1, NULL, 12000, 1),
(13, 69, 1, 24, 17000, 1),
(13, 56, 1, NULL, 15000, 1),
(14, 53, 1, NULL, 14000, 1),
(14, 72, 1, NULL, 14000, 1),
(15, 57, 1, NULL, 12000, 1),
(15, 66, 2, NULL, 14000, 1),
(16, 61, 1, NULL, 15000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(11) NOT NULL,
  `total_diskon` int(11) NOT NULL,
  `min_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `total_diskon`, `min_pembelian`) VALUES
(1, 10, 50000),
(2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ekstra`
--

CREATE TABLE `ekstra` (
  `id_ekstra` int(11) NOT NULL,
  `nama_ekstra` varchar(20) NOT NULL,
  `stock_awal` float NOT NULL,
  `penambahan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `sisa` float NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `id_region` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekstra`
--

INSERT INTO `ekstra` (`id_ekstra`, `nama_ekstra`, `stock_awal`, `penambahan`, `total`, `sisa`, `satuan`, `id_region`) VALUES
(62, 'Susu Putih', 10, 0, 10, 9.7, 'Liter', 1),
(63, 'Susu Coklat', 10, 0, 10, 10, 'Liter', 1),
(64, 'Cup', 100, 0, 100, 95, 'Cup', 1),
(65, 'Yakult', 50, 0, 50, 50, 'Botol', 1),
(66, 'Bubble', 60, 0, 60, 60, 'Cup', 1),
(67, 'Lychee', 20, 0, 20, 20, 'Liter', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_menu`
--

CREATE TABLE `jenis_menu` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_menu`
--

INSERT INTO `jenis_menu` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Basic'),
(2, 'Premium'),
(3, 'Soklat'),
(4, 'Choco Premium'),
(5, 'Yakult'),
(6, 'Fresh And Juice');

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE `jual` (
  `no_nota` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `total_awal` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `pesanan_gojek` enum('Ya','No') NOT NULL,
  `status` enum('Process','Success') NOT NULL DEFAULT 'Process',
  `id_staff` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`no_nota`, `tanggal`, `waktu`, `nama_pembeli`, `total_awal`, `diskon`, `total`, `pesanan_gojek`, `status`, `id_staff`) VALUES
(9, '2019-11-22', '13:00:04', 'maruf', 10000, 0, 12000, 'Ya', 'Process', 'S0005'),
(10, '2019-11-23', '16:14:06', 'aziz', 29000, 0, 29000, 'No', 'Process', 'S0005'),
(11, '2019-11-23', '16:21:05', 'trecya', 17000, 0, 17000, 'No', 'Process', 'S0005'),
(12, '2019-11-23', '16:21:49', 'aziz', 12000, 0, 12000, 'No', 'Process', 'S0005'),
(13, '2019-11-25', '08:00:31', 'aziz', 28000, 0, 32000, 'Ya', 'Success', 'S0005'),
(14, '2019-11-25', '19:03:34', 'maruf', 24000, 0, 28000, 'Ya', 'Success', 'S0005'),
(15, '2019-11-25', '19:05:54', 'shesa', 26000, 0, 26000, 'No', 'Success', 'S0005'),
(16, '2019-11-25', '19:11:54', 'citra', 13000, 0, 15000, 'Ya', 'Success', 'S0005');

-- --------------------------------------------------------

--
-- Table structure for table `penyajian`
--

CREATE TABLE `penyajian` (
  `id_penyajian` int(11) NOT NULL,
  `nama_penyajian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyajian`
--

INSERT INTO `penyajian` (`id_penyajian`, `nama_penyajian`) VALUES
(1, 'Basic'),
(2, 'PM'),
(3, 'Hot'),
(4, 'Yakult'),
(5, 'Juice');

-- --------------------------------------------------------

--
-- Table structure for table `powder`
--

CREATE TABLE `powder` (
  `id_powder` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama_powder` varchar(20) NOT NULL,
  `id_varian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powder`
--

INSERT INTO `powder` (`id_powder`, `id_jenis`, `nama_powder`, `id_varian`) VALUES
(53, 1, 'Choco Bar', 13),
(54, 1, 'Choco Aren', 13),
(55, 4, 'Choco Rum', 13),
(56, 4, 'Choco Hazel', 13),
(57, 1, 'Thai Tea', 14),
(58, 5, 'Thai Tea Yakult', 14),
(59, 1, 'Taro', 15),
(60, 5, 'Taro Yakult', 15),
(61, 2, 'Green Tea', 16),
(62, 5, 'Green Tea Yakult', 16),
(63, 2, 'Forrest Gump', 17),
(64, 5, 'Forrest Gump Yakult', 17),
(65, 1, 'Choco Mint', 18),
(66, 1, 'Westham', 21),
(67, 1, 'Vanilla Late', 20),
(68, 2, 'Red Velvet', 22),
(69, 3, 'Advocado Choco', 23),
(70, 3, 'Choco Cheese', 24),
(71, 3, 'Choco Millow', 25),
(72, 1, 'Choco Oreo', 19);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id_region` int(11) NOT NULL,
  `nama_region` varchar(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id_region`, `nama_region`, `alamat`) VALUES
(1, 'Seturan', 'Jl. Seturan Raya'),
(2, 'Kaliurang', 'Jl. Kaliurang'),
(3, 'Janti', 'jl janti no 123');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` char(5) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `Nama`, `username`, `password`, `contact`, `alamat`, `email`, `image`) VALUES
('S0001', 'farid', '42d', '42d', '081328455575', 'Jl. Kalasan', '42d@gmail.com', 'icon.png'),
('S0002', 'kiki', 'kiki', 'kiki', '0819556564', 'sleman', 'oke@gmail.com', ''),
('S0003', 'Melon', 'melon', 'poltergeist', '0853', 'skip', 'm.taftazani123@gmail.com', ''),
('S0004', 'Kocheng', 'Kocheng', 'barbar', '0812345678900', 'jogja', 'kocheng@gmail.com', ''),
('S0005', 'Oyen', 'Oyen', 'oyen', '08', 'jalanan', 'barbar@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `topping`
--

CREATE TABLE `topping` (
  `id_topping` int(11) NOT NULL,
  `nama_topping` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock_awal` int(11) NOT NULL,
  `penambahan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topping`
--

INSERT INTO `topping` (`id_topping`, `nama_topping`, `harga`, `stock_awal`, `penambahan`, `total`, `sisa`, `id_region`) VALUES
(24, 'Bubble', 3000, 10, 5, 15, 14, 1),
(25, 'Jelly', 3000, 15, 0, 15, 14, 1),
(26, 'Oreo', 3000, 17, 0, 17, 16, 1),
(27, 'Aloevera', 3000, 15, 0, 15, 15, 1),
(28, 'Popping Boba', 4000, 25, 0, 25, 25, 1),
(29, 'Rainbow Jelly', 4000, 30, 0, 30, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `varian_powder`
--

CREATE TABLE `varian_powder` (
  `id_varian` int(11) NOT NULL,
  `nama_varian` varchar(50) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `penambahan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `varian_powder`
--

INSERT INTO `varian_powder` (`id_varian`, `nama_varian`, `stok_awal`, `penambahan`, `total`, `sisa`, `id_region`) VALUES
(13, 'Choco Bar', 20, 0, 20, 15, 1),
(14, 'Thai Tea', 20, 0, 20, 19, 1),
(15, 'Taro', 25, 0, 25, 24, 1),
(16, 'Green Tea', 20, 0, 20, 19, 1),
(17, 'Forrest Gump', 20, 0, 20, 20, 1),
(18, 'Choco Mint', 18, 0, 18, 18, 1),
(19, 'Choco Oreo', 20, 0, 20, 19, 1),
(20, 'Vanila Latte', 25, 0, 25, 25, 1),
(21, 'Westham', 30, 0, 30, 29, 1),
(22, 'Red Velvet', 25, 0, 25, 25, 1),
(23, 'Advocado Choco', 20, 0, 20, 19, 1),
(24, 'Choco Cheese', 20, 0, 20, 20, 1),
(25, 'Choco Millow', 20, 0, 20, 20, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_ekstra`
--
ALTER TABLE `detail_ekstra`
  ADD KEY `id_ekstra` (`id_ekstra`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `detail_penyajian`
--
ALTER TABLE `detail_penyajian`
  ADD KEY `id_powder` (`id_powder`),
  ADD KEY `id_penyajian` (`id_penyajian`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `no_nota` (`no_nota`),
  ADD KEY `id_powder` (`id_powder`),
  ADD KEY `id_topping` (`id_topping`),
  ADD KEY `id_penyajian` (`id_penyajian`),
  ADD KEY `id_region` (`id_region`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `ekstra`
--
ALTER TABLE `ekstra`
  ADD PRIMARY KEY (`id_ekstra`),
  ADD KEY `id_region` (`id_region`),
  ADD KEY `id_region_2` (`id_region`);

--
-- Indexes for table `jenis_menu`
--
ALTER TABLE `jenis_menu`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`no_nota`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indexes for table `penyajian`
--
ALTER TABLE `penyajian`
  ADD PRIMARY KEY (`id_penyajian`);

--
-- Indexes for table `powder`
--
ALTER TABLE `powder`
  ADD PRIMARY KEY (`id_powder`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_varian` (`id_varian`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id_region`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `topping`
--
ALTER TABLE `topping`
  ADD PRIMARY KEY (`id_topping`),
  ADD KEY `id_region` (`id_region`);

--
-- Indexes for table `varian_powder`
--
ALTER TABLE `varian_powder`
  ADD PRIMARY KEY (`id_varian`),
  ADD KEY `id_region` (`id_region`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ekstra`
--
ALTER TABLE `ekstra`
  MODIFY `id_ekstra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `jenis_menu`
--
ALTER TABLE `jenis_menu`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jual`
--
ALTER TABLE `jual`
  MODIFY `no_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `penyajian`
--
ALTER TABLE `penyajian`
  MODIFY `id_penyajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `powder`
--
ALTER TABLE `powder`
  MODIFY `id_powder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id_region` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topping`
--
ALTER TABLE `topping`
  MODIFY `id_topping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `varian_powder`
--
ALTER TABLE `varian_powder`
  MODIFY `id_varian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_ekstra`
--
ALTER TABLE `detail_ekstra`
  ADD CONSTRAINT `detail_ekstra_ibfk_1` FOREIGN KEY (`id_ekstra`) REFERENCES `ekstra` (`id_ekstra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_ekstra_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_menu` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_penyajian`
--
ALTER TABLE `detail_penyajian`
  ADD CONSTRAINT `detail_penyajian_ibfk_1` FOREIGN KEY (`id_powder`) REFERENCES `powder` (`id_powder`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penyajian_ibfk_2` FOREIGN KEY (`id_penyajian`) REFERENCES `penyajian` (`id_penyajian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_powder`) REFERENCES `powder` (`id_powder`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_4` FOREIGN KEY (`id_topping`) REFERENCES `topping` (`id_topping`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_5` FOREIGN KEY (`id_penyajian`) REFERENCES `penyajian` (`id_penyajian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_6` FOREIGN KEY (`no_nota`) REFERENCES `jual` (`no_nota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_7` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ekstra`
--
ALTER TABLE `ekstra`
  ADD CONSTRAINT `ekstra_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ekstra_ibfk_2` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jual`
--
ALTER TABLE `jual`
  ADD CONSTRAINT `jual_ibfk_1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `powder`
--
ALTER TABLE `powder`
  ADD CONSTRAINT `powder_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_menu` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `powder_ibfk_2` FOREIGN KEY (`id_varian`) REFERENCES `varian_powder` (`id_varian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topping`
--
ALTER TABLE `topping`
  ADD CONSTRAINT `topping_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `varian_powder`
--
ALTER TABLE `varian_powder`
  ADD CONSTRAINT `varian_powder_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `e_detail_ekstra` ON SCHEDULE EVERY 1 DAY STARTS '2019-10-28 15:20:43' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE detail_ekstra SET pemakaian = 0$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
