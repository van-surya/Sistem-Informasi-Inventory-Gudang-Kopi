-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2022 at 01:18 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `senjakopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stock_toko` varchar(20) NOT NULL,
  `stock_gudang` varchar(20) NOT NULL,
  `satuan` enum('Liter','Kilogram','Gram') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `id_supplier`, `kode_barang`, `nama_barang`, `stock_toko`, `stock_gudang`, `satuan`) VALUES
(1, 4, 1, 'BR001', 'Minyak Goreng Bimoli', '3', '48', 'Liter'),
(2, 4, 2, 'BR002', 'Bubuk Merica', '7', '30', 'Kilogram'),
(3, 4, 2, 'BR003', 'Bubuk Lada', '10', '25', 'Kilogram'),
(4, 2, 3, 'BR004', 'Aqua', '10', '62', 'Liter'),
(5, 3, 3, 'BR005', 'Tepung terigu', '10', '20', 'Kilogram'),
(6, 3, 3, 'BR006', 'Tepung tapioka', '10', '10', 'Kilogram'),
(7, 4, 2, 'asd', 'asd', '1', '1', 'Kilogram');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barangkeluar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_permintaanbarang` int(11) NOT NULL,
  `kode_barangkeluar` varchar(5) NOT NULL,
  `tgl_barangkeluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barangkeluar`, `id_user`, `id_permintaanbarang`, `kode_barangkeluar`, `tgl_barangkeluar`) VALUES
(2, 4, 1, 'BK001', '2022-03-29'),
(3, 4, 2, 'BK002', '2022-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barangmasuk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_permintaanpembelian` int(11) NOT NULL,
  `kode_barangmasuk` varchar(5) NOT NULL,
  `tgl_barangmasuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barangmasuk`, `id_user`, `id_permintaanpembelian`, `kode_barangmasuk`, `tgl_barangmasuk`) VALUES
(1, 4, 1, 'BM001', '2022-03-29'),
(2, 4, 3, 'BM002', '2022-05-25'),
(3, 4, 4, 'BM003', '2022-05-28'),
(4, 4, 5, 'BM004', '2022-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `detail_permintaanbarang`
--

CREATE TABLE `detail_permintaanbarang` (
  `id_detailpermintaanbarang` int(11) NOT NULL,
  `id_permintaanbarang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_permintaanbarang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_permintaanbarang`
--

INSERT INTO `detail_permintaanbarang` (`id_detailpermintaanbarang`, `id_permintaanbarang`, `id_barang`, `jumlah_permintaanbarang`) VALUES
(1, 1, 1, '5'),
(2, 1, 3, '5'),
(3, 1, 5, '6'),
(4, 1, 4, '6'),
(5, 1, 2, '6'),
(6, 2, 1, '5'),
(8, 2, 2, '5'),
(9, 3, 3, '12');

-- --------------------------------------------------------

--
-- Table structure for table `detail_permintaanpembelian`
--

CREATE TABLE `detail_permintaanpembelian` (
  `id_detailpermintaanpembelian` int(11) NOT NULL,
  `id_permintaanpembelian` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_permintaanpembelian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_permintaanpembelian`
--

INSERT INTO `detail_permintaanpembelian` (`id_detailpermintaanpembelian`, `id_permintaanpembelian`, `id_barang`, `jumlah_permintaanpembelian`) VALUES
(1, 1, 1, '30'),
(2, 1, 2, '10'),
(3, 1, 3, '10'),
(4, 1, 4, '10'),
(5, 1, 5, '20'),
(6, 1, 6, '15'),
(7, 2, 4, '50'),
(8, 3, 1, '22'),
(9, 3, 4, '22'),
(10, 4, 3, '5'),
(12, 5, 1, '30');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Minuman'),
(3, 'Tepung'),
(4, 'Bahan Pokok');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_barang`
--

CREATE TABLE `permintaan_barang` (
  `id_permintaanbarang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_permintaanbarang` varchar(5) NOT NULL,
  `tgl_permintaanbarang` date NOT NULL,
  `status_permintaanbarang` enum('Meminta','Setuju','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permintaan_barang`
--

INSERT INTO `permintaan_barang` (`id_permintaanbarang`, `id_user`, `kode_permintaanbarang`, `tgl_permintaanbarang`, `status_permintaanbarang`) VALUES
(1, 2, 'PB001', '2022-03-29', 'Setuju'),
(2, 2, 'PB002', '2022-05-26', 'Setuju'),
(3, 2, 'PB003', '2022-05-25', 'Meminta');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_pembelian`
--

CREATE TABLE `permintaan_pembelian` (
  `id_permintaanpembelian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_permintaanpembelian` varchar(5) NOT NULL,
  `tgl_permintaanpembelian` date NOT NULL,
  `status_permintaanpembelian` enum('Meminta','Ditolak','Setuju') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permintaan_pembelian`
--

INSERT INTO `permintaan_pembelian` (`id_permintaanpembelian`, `id_user`, `kode_permintaanpembelian`, `tgl_permintaanpembelian`, `status_permintaanpembelian`) VALUES
(1, 4, 'PP001', '2022-03-29', 'Setuju'),
(2, 4, 'PP002', '2022-03-30', 'Ditolak'),
(3, 4, 'PP003', '2022-05-17', 'Setuju'),
(4, 4, 'PP004', '2022-05-12', 'Setuju'),
(5, 4, 'PP005', '2022-05-17', 'Setuju');

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `id_po` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_permintaanpembelian` int(11) NOT NULL,
  `kode_po` varchar(5) NOT NULL,
  `tgl_po` date NOT NULL,
  `status_po` enum('Mengirim','Diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`id_po`, `id_user`, `id_permintaanpembelian`, `kode_po`, `tgl_po`, `status_po`) VALUES
(1, 3, 1, 'PO001', '2022-03-29', 'Diterima'),
(2, 3, 3, 'PO002', '2022-05-17', 'Diterima'),
(3, 3, 4, 'PO003', '2022-05-17', 'Diterima'),
(4, 3, 5, 'PO004', '2022-05-17', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `kode_supplier` varchar(5) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `kode_supplier`, `nama_supplier`, `alamat_supplier`) VALUES
(1, 'SP001', 'PT. MITRA SEMBAKO INDONESIA', 'Jakarta Selatan. Daerah Khusus Ibukota Jakarta 12850'),
(2, 'SP002', 'PT IDMARKOM', 'Jr. Yos Sudarso No. 797, Bontang 68889, SumUt '),
(3, 'SP003', 'PT Sinar Surya', 'Kpg. Sumpah Pemuda No. 967, Pematangsiantar 75129, MalUt ');

-- --------------------------------------------------------

--
-- Table structure for table `user_petugas`
--

CREATE TABLE `user_petugas` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto_user` varchar(100) NOT NULL,
  `level` enum('admin','store','purchasing','gudang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_petugas`
--

INSERT INTO `user_petugas` (`id_user`, `nama`, `jabatan`, `phone`, `email`, `password`, `foto_user`, `level`) VALUES
(1, 'Darsirah', 'Manager', '082311707366', 'admin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'female-3.png', 'admin'),
(2, 'Silvia Wastuti', 'Manager Stores', '087516756155', 'store@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'female-2.png', 'store'),
(3, 'Oni Melani', 'Manager Purchasing', '0270458776', 'purchasing@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'female-1.png', 'purchasing'),
(4, 'Cengkir Ramadan', 'Manager Gudang', '07347864847', 'gudang@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'male-1.png', 'gudang'),
(5, 'bonus', 'vonus', '12121212', 'bonus@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 'purchasing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`,`id_supplier`),
  ADD KEY `barang_ibfk_1` (`id_supplier`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barangkeluar`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_permintaanbarang` (`id_permintaanbarang`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barangmasuk`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_permintaanpembelian` (`id_permintaanpembelian`);

--
-- Indexes for table `detail_permintaanbarang`
--
ALTER TABLE `detail_permintaanbarang`
  ADD PRIMARY KEY (`id_detailpermintaanbarang`),
  ADD KEY `id_permintaanbarang` (`id_permintaanbarang`,`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `detail_permintaanpembelian`
--
ALTER TABLE `detail_permintaanpembelian`
  ADD PRIMARY KEY (`id_detailpermintaanpembelian`),
  ADD KEY `id_permintaanpembelian` (`id_permintaanpembelian`,`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  ADD PRIMARY KEY (`id_permintaanbarang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `permintaan_pembelian`
--
ALTER TABLE `permintaan_pembelian`
  ADD PRIMARY KEY (`id_permintaanpembelian`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id_po`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_permintaanpembelian` (`id_permintaanpembelian`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user_petugas`
--
ALTER TABLE `user_petugas`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barangkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barangmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_permintaanbarang`
--
ALTER TABLE `detail_permintaanbarang`
  MODIFY `id_detailpermintaanbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_permintaanpembelian`
--
ALTER TABLE `detail_permintaanpembelian`
  MODIFY `id_detailpermintaanpembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  MODIFY `id_permintaanbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permintaan_pembelian`
--
ALTER TABLE `permintaan_pembelian`
  MODIFY `id_permintaanpembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `id_po` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_petugas`
--
ALTER TABLE `user_petugas`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_petugas` (`id_user`),
  ADD CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`id_permintaanbarang`) REFERENCES `permintaan_barang` (`id_permintaanbarang`);

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_petugas` (`id_user`),
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`id_permintaanpembelian`) REFERENCES `permintaan_pembelian` (`id_permintaanpembelian`);

--
-- Constraints for table `detail_permintaanbarang`
--
ALTER TABLE `detail_permintaanbarang`
  ADD CONSTRAINT `detail_permintaanbarang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `detail_permintaanbarang_ibfk_2` FOREIGN KEY (`id_permintaanbarang`) REFERENCES `permintaan_barang` (`id_permintaanbarang`);

--
-- Constraints for table `detail_permintaanpembelian`
--
ALTER TABLE `detail_permintaanpembelian`
  ADD CONSTRAINT `detail_permintaanpembelian_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `detail_permintaanpembelian_ibfk_2` FOREIGN KEY (`id_permintaanpembelian`) REFERENCES `permintaan_pembelian` (`id_permintaanpembelian`);

--
-- Constraints for table `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  ADD CONSTRAINT `permintaan_barang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_petugas` (`id_user`);

--
-- Constraints for table `permintaan_pembelian`
--
ALTER TABLE `permintaan_pembelian`
  ADD CONSTRAINT `permintaan_pembelian_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user_petugas` (`id_user`);

--
-- Constraints for table `po`
--
ALTER TABLE `po`
  ADD CONSTRAINT `po_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_petugas` (`id_user`),
  ADD CONSTRAINT `po_ibfk_2` FOREIGN KEY (`id_permintaanpembelian`) REFERENCES `permintaan_pembelian` (`id_permintaanpembelian`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
