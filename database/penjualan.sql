-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2025 at 01:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `perusahaan_cust` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `perusahaan_cust`, `alamat`) VALUES
(1, 'Jayu', 'pertamina', 'Bogor'),
(2, 'Candra', 'Citilink', 'Jakarta'),
(3, 'ada', 'hy', 'Tangerang Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `detail_faktur`
--

CREATE TABLE `detail_faktur` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `no_faktur` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faktur`
--

CREATE TABLE `faktur` (
  `no_faktur` int(11) NOT NULL,
  `tgl_faktur` date NOT NULL,
  `due_date` date NOT NULL,
  `metode_bayar` varchar(50) NOT NULL,
  `ppn` decimal(10,2) NOT NULL,
  `dp` decimal(10,2) NOT NULL,
  `grand_total` decimal(12,2) NOT NULL,
  `user` varchar(50) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faktur`
--

INSERT INTO `faktur` (`no_faktur`, `tgl_faktur`, `due_date`, `metode_bayar`, `ppn`, `dp`, `grand_total`, `user`, `id_customer`, `id_perusahaan`) VALUES
(1, '2025-05-20', '2025-05-21', 'Transfer', 2000.00, 5000.00, 25000.00, 'admin', 2, 3),
(112, '2025-05-14', '2025-05-14', 'transfer', 2500.00, 5000.00, 25000.00, 'Candra', 2, 2),
(113, '2025-05-13', '2025-05-13', 'cash', 5000.00, 10000.00, 50000.00, 'Jayu', 1, 1),
(233, '2025-05-14', '2025-05-14', 'Kredit', 3000.00, 10000.00, 30000.00, 'admin', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat`, `no_telp`, `fax`) VALUES
(1, 'Pertaminaa', 'Bogor', '085476544567', '124589789'),
(2, 'citilink', 'Jakarta', '08547655678', '0867543245'),
(3, 'fer', 'kalal', '085476544576', '124589769');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `price`, `jenis`, `stock`) VALUES
(1, 'Sirup Batuk', 10000.00, 'Cairan', 101),
(2, 'Obat pilek', 25000.00, 'Serbuk', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `detail_faktur`
--
ALTER TABLE `detail_faktur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produk` (`id_produk`),
  ADD KEY `fk_faktur` (`no_faktur`);

--
-- Indexes for table `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_faktur`
--
ALTER TABLE `detail_faktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faktur`
--
ALTER TABLE `faktur`
  MODIFY `no_faktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_faktur`
--
ALTER TABLE `detail_faktur`
  ADD CONSTRAINT `fk_faktur` FOREIGN KEY (`no_faktur`) REFERENCES `faktur` (`no_faktur`),
  ADD CONSTRAINT `fk_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
