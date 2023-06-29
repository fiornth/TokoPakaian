-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 02:52 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_pakaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `Kode_kategori` int(10) NOT NULL,
  `Nama_kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`Kode_kategori`, `Nama_kategori`) VALUES
(1001, 'Baju'),
(1002, 'Celana'),
(1003, 'Jaket'),
(1004, 'Topi');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_pembelian`
--

CREATE TABLE `laporan_pembelian` (
  `Id_beli` int(10) NOT NULL,
  `Id_supplier` int(10) NOT NULL,
  `Tanggal` date NOT NULL,
  `Total_pembayaran` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_pembelian`
--

INSERT INTO `laporan_pembelian` (`Id_beli`, `Id_supplier`, `Tanggal`, `Total_pembayaran`) VALUES
(5001, 2001, '2022-01-03', 22500000),
(5002, 2002, '2022-01-04', 20900000),
(5003, 2003, '2022-01-05', 5400000),
(5004, 2004, '2022-01-06', 4750000),
(5005, 2005, '2022-01-06', 6045000);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_penjualan`
--

CREATE TABLE `laporan_penjualan` (
  `Id_jual` int(10) NOT NULL,
  `Id_pelanggan` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `total_pembayaran` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_penjualan`
--

INSERT INTO `laporan_penjualan` (`Id_jual`, `Id_pelanggan`, `tanggal`, `total_pembayaran`) VALUES
(6001, 4001, '2022-01-07', 1385999),
(6002, 4004, '2022-01-08', 1686499),
(6003, 4002, '2022-01-10', 488500),
(6004, 4003, '2022-01-10', 288000),
(6005, 4005, '2022-01-09', 587500);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `Id_pelanggan` int(10) NOT NULL,
  `Nama_pelanggan` varchar(30) NOT NULL,
  `Alamat_pelanggan` varchar(50) NOT NULL,
  `Telepon_pelanggan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`Id_pelanggan`, `Nama_pelanggan`, `Alamat_pelanggan`, `Telepon_pelanggan`) VALUES
(4001, 'Karina Putri', 'Jl. Kwangya No. 4', '081502059368'),
(4002, 'Anton Wahiddin', 'Jl. Anggrek No. 12', '081333155890'),
(4003, 'Herina Karlina', 'Jl. Kesturi No. 98', '088165863901'),
(4004, 'Mark ', 'Jl. Kanandah No. 127', '081390532299'),
(4005, 'Andrew Putra ', 'Jl. Langur No. 55', '081289032652'),
(4006, 'Jessy L', 'Jl. Komodo No. 66', '089321089021'),
(4007, 'Martin ', 'Jl. Cempedak No. 32', '081290853290');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `Id_produk` int(10) NOT NULL,
  `Id_supplier` int(10) NOT NULL,
  `Nama_produk` varchar(255) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  `Kuantitas` int(10) NOT NULL,
  `Harga` int(10) NOT NULL,
  `Kode_kategori` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`Id_produk`, `Id_supplier`, `Nama_produk`, `Foto`, `Kuantitas`, `Harga`, `Kode_kategori`) VALUES
(3001, 2005, 'White T-Shirt Woman Gugugu', 'whiteshirt.jpg', 65, 99000, 1001),
(3002, 2004, 'Black T-Shirt Man Prims', 'blacktshirtp.jpg', 50, 99500, 1001),
(3003, 2001, 'IBB Blouson Jacket', 'blousonjacket.jpg', 25, 998999, 1003),
(3004, 2002, 'Cargo Pants SC', 'cargopants.jpeg', 55, 389000, 1002),
(3005, 2003, 'IJB Fit and Flare ', 'fitflarepants.jpg', 30, 189000, 1002),
(3006, 2001, 'IMV Bomber Jacket ', 'bomberjacket2.jpg', 150, 895000, 1003),
(3007, 2006, 'HC Cap', 'capch.jpg', 45, 45000, 1004);

-- --------------------------------------------------------

--
-- Table structure for table `rincian_pembelian`
--

CREATE TABLE `rincian_pembelian` (
  `Id_beli` int(10) NOT NULL,
  `Id_produk` int(10) NOT NULL,
  `Kuantitas` int(10) NOT NULL,
  `Harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rincian_pembelian`
--

INSERT INTO `rincian_pembelian` (`Id_beli`, `Id_produk`, `Kuantitas`, `Harga`) VALUES
(5001, 3003, 25, 22500000),
(5002, 3004, 55, 20900000),
(5003, 3005, 30, 5400000),
(5004, 3002, 50, 4750000),
(5005, 3001, 65, 6045000);

-- --------------------------------------------------------

--
-- Table structure for table `rincian_penjualan`
--

CREATE TABLE `rincian_penjualan` (
  `Id_jual` int(10) NOT NULL,
  `Id_produk` int(10) NOT NULL,
  `Kuantitas` int(10) NOT NULL,
  `Harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rincian_penjualan`
--

INSERT INTO `rincian_penjualan` (`Id_jual`, `Id_produk`, `Kuantitas`, `Harga`) VALUES
(6001, 3001, 2, 99000),
(6001, 3005, 1, 189000),
(6001, 3003, 1, 998999),
(6002, 3002, 3, 99500),
(6002, 3003, 1, 998999),
(6002, 3004, 1, 389000),
(6003, 3002, 1, 99500),
(6003, 3004, 1, 389000),
(6004, 3001, 1, 99000),
(6004, 3005, 1, 189000),
(6005, 3001, 1, 99000),
(6005, 3002, 1, 99500),
(6005, 3004, 1, 389000);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Id_supplier` int(10) NOT NULL,
  `Nama_supplier` varchar(30) NOT NULL,
  `Alamat_supplier` varchar(50) NOT NULL,
  `Telepon_supplier` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Id_supplier`, `Nama_supplier`, `Alamat_supplier`, `Telepon_supplier`) VALUES
(2001, 'CV Your Textile', 'Jl. Melati No. 19', '085680953323'),
(2002, 'PT. Bagus Anet', 'Jl. Cendrawasih No. 35', '081532558902'),
(2003, 'PT. Indah True', 'Jl. Manggis No. 83', '081533890213'),
(2004, 'CV Jaya Prima', 'Jl. Turi No. 95', '081235860903'),
(2005, 'PT. Cotton Isgud', 'Jl. Mangga No. 55', '081253211906'),
(2006, 'PT. Testile', 'Jl.  Jawa No. 94', '081290893245');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`Kode_kategori`);

--
-- Indexes for table `laporan_pembelian`
--
ALTER TABLE `laporan_pembelian`
  ADD PRIMARY KEY (`Id_beli`),
  ADD KEY `Id_supplier` (`Id_supplier`);

--
-- Indexes for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  ADD PRIMARY KEY (`Id_jual`),
  ADD KEY `Id_pelanggan` (`Id_pelanggan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`Id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`Id_produk`),
  ADD KEY `Kode_kategori` (`Kode_kategori`),
  ADD KEY `Id_supplier` (`Id_supplier`);

--
-- Indexes for table `rincian_pembelian`
--
ALTER TABLE `rincian_pembelian`
  ADD KEY `Id_beli` (`Id_beli`),
  ADD KEY `Id_produk` (`Id_produk`);

--
-- Indexes for table `rincian_penjualan`
--
ALTER TABLE `rincian_penjualan`
  ADD KEY `Id_jual` (`Id_jual`),
  ADD KEY `Id_produk` (`Id_produk`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `Kode_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1110;

--
-- AUTO_INCREMENT for table `laporan_pembelian`
--
ALTER TABLE `laporan_pembelian`
  MODIFY `Id_beli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5006;

--
-- AUTO_INCREMENT for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  MODIFY `Id_jual` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6006;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `Id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4011;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `Id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12372;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Id_supplier` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2011;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan_pembelian`
--
ALTER TABLE `laporan_pembelian`
  ADD CONSTRAINT `laporan_pembelian_ibfk_1` FOREIGN KEY (`Id_supplier`) REFERENCES `supplier` (`Id_supplier`);

--
-- Constraints for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  ADD CONSTRAINT `laporan_penjualan_ibfk_1` FOREIGN KEY (`Id_pelanggan`) REFERENCES `pelanggan` (`Id_pelanggan`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`Kode_kategori`) REFERENCES `kategori` (`Kode_kategori`),
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`Id_supplier`) REFERENCES `supplier` (`Id_supplier`);

--
-- Constraints for table `rincian_pembelian`
--
ALTER TABLE `rincian_pembelian`
  ADD CONSTRAINT `rincian_pembelian_ibfk_1` FOREIGN KEY (`Id_beli`) REFERENCES `laporan_pembelian` (`Id_beli`),
  ADD CONSTRAINT `rincian_pembelian_ibfk_2` FOREIGN KEY (`Id_produk`) REFERENCES `produk` (`Id_produk`);

--
-- Constraints for table `rincian_penjualan`
--
ALTER TABLE `rincian_penjualan`
  ADD CONSTRAINT `rincian_penjualan_ibfk_1` FOREIGN KEY (`Id_jual`) REFERENCES `laporan_penjualan` (`Id_jual`),
  ADD CONSTRAINT `rincian_penjualan_ibfk_2` FOREIGN KEY (`Id_produk`) REFERENCES `produk` (`Id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
