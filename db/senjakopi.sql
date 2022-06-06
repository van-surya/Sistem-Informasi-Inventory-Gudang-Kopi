-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2022 pada 17.05
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

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
-- Struktur dari tabel `barang`
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
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `id_supplier`, `kode_barang`, `nama_barang`, `stock_toko`, `stock_gudang`, `satuan`) VALUES
(8, 3, 6, 'BR001', 'Tepung Terigu', '86', '100', 'Kilogram'),
(9, 4, 6, 'BR002', 'Margarin', '434', '27', 'Gram'),
(10, 4, 5, 'BR003', 'Gula halus', '133', '83', 'Kilogram'),
(11, 4, 5, 'BR004', 'Susu Bubuk', '11111', '23', 'Kilogram');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barangkeluar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_permintaanbarang` int(11) NOT NULL,
  `kode_barangkeluar` varchar(5) NOT NULL,
  `tgl_barangkeluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barangkeluar`, `id_user`, `id_permintaanbarang`, `kode_barangkeluar`, `tgl_barangkeluar`) VALUES
(10, 4, 10, 'BK001', '2022-06-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barangmasuk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_permintaanpembelian` int(11) NOT NULL,
  `kode_barangmasuk` varchar(5) NOT NULL,
  `tgl_barangmasuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barangmasuk`, `id_user`, `id_permintaanpembelian`, `kode_barangmasuk`, `tgl_barangmasuk`) VALUES
(6, 4, 7, 'BM001', '2022-06-01'),
(7, 4, 10, 'BM002', '2022-06-01'),
(8, 4, 13, 'BM003', '2022-06-01'),
(9, 4, 11, 'BM004', '2022-06-01'),
(10, 4, 12, 'BM005', '2022-06-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penggunaan`
--

CREATE TABLE `detail_penggunaan` (
  `id_detailpenggunaan` int(11) NOT NULL,
  `id_penggunaan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_penggunaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_penggunaan`
--

INSERT INTO `detail_penggunaan` (`id_detailpenggunaan`, `id_penggunaan`, `id_barang`, `jumlah_penggunaan`) VALUES
(15, 21, 10, '2'),
(16, 20, 9, '10'),
(18, 20, 10, '44'),
(20, 21, 9, '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_permintaanbarang`
--

CREATE TABLE `detail_permintaanbarang` (
  `id_detailpermintaanbarang` int(11) NOT NULL,
  `id_permintaanbarang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_permintaanbarang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_permintaanbarang`
--

INSERT INTO `detail_permintaanbarang` (`id_detailpermintaanbarang`, `id_permintaanbarang`, `id_barang`, `jumlah_permintaanbarang`) VALUES
(24, 10, 8, '100'),
(25, 10, 9, '399'),
(26, 10, 10, '200'),
(27, 10, 11, '400'),
(28, 11, 8, '2'),
(29, 13, 8, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_permintaanpembelian`
--

CREATE TABLE `detail_permintaanpembelian` (
  `id_detailpermintaanpembelian` int(11) NOT NULL,
  `id_permintaanpembelian` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_permintaanpembelian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_permintaanpembelian`
--

INSERT INTO `detail_permintaanpembelian` (`id_detailpermintaanpembelian`, `id_permintaanpembelian`, `id_barang`, `jumlah_permintaanpembelian`) VALUES
(18, 7, 9, '400'),
(19, 7, 8, '200'),
(20, 7, 11, '400'),
(21, 7, 10, '250'),
(22, 10, 10, '33'),
(23, 11, 9, '3'),
(24, 12, 9, '23'),
(25, 13, 11, '23'),
(26, 15, 9, '32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Minuman'),
(3, 'Tepung'),
(4, 'Bahan Pokok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggunaan`
--

CREATE TABLE `penggunaan` (
  `id_penggunaan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_penggunaan` varchar(6) NOT NULL,
  `tgl_penggunaan` date NOT NULL,
  `shift` enum('Pertama','Kedua') NOT NULL,
  `status` enum('ya','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penggunaan`
--

INSERT INTO `penggunaan` (`id_penggunaan`, `id_user`, `kode_penggunaan`, `tgl_penggunaan`, `shift`, `status`) VALUES
(13, 2, 'KP003', '2022-06-06', 'Pertama', 'ya'),
(20, 2, 'KP005', '2022-06-06', 'Pertama', 'ya'),
(21, 2, 'KP006', '2022-06-06', 'Pertama', 'ya'),
(22, 2, 'KP007', '2022-06-17', 'Pertama', 'tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_barang`
--

CREATE TABLE `permintaan_barang` (
  `id_permintaanbarang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_permintaanbarang` varchar(5) NOT NULL,
  `tgl_permintaanbarang` date NOT NULL,
  `status_permintaanbarang` enum('Meminta','Setuju','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `permintaan_barang`
--

INSERT INTO `permintaan_barang` (`id_permintaanbarang`, `id_user`, `kode_permintaanbarang`, `tgl_permintaanbarang`, `status_permintaanbarang`) VALUES
(10, 2, 'PB001', '2022-06-01', 'Setuju'),
(11, 2, 'PB002', '2022-06-10', 'Setuju'),
(12, 2, 'PB003', '2022-06-13', 'Ditolak'),
(13, 2, 'PB004', '2022-06-01', 'Setuju'),
(14, 2, 'PB005', '2022-06-01', 'Ditolak'),
(15, 2, 'PB006', '2022-06-01', 'Setuju'),
(16, 2, 'PB007', '2022-06-01', 'Ditolak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_pembelian`
--

CREATE TABLE `permintaan_pembelian` (
  `id_permintaanpembelian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_permintaanpembelian` varchar(5) NOT NULL,
  `tgl_permintaanpembelian` date NOT NULL,
  `status_permintaanpembelian` enum('Meminta','Ditolak','Setuju') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `permintaan_pembelian`
--

INSERT INTO `permintaan_pembelian` (`id_permintaanpembelian`, `id_user`, `kode_permintaanpembelian`, `tgl_permintaanpembelian`, `status_permintaanpembelian`) VALUES
(7, 4, 'PP001', '2022-06-01', 'Setuju'),
(10, 4, 'PP003', '2022-06-01', 'Setuju'),
(11, 4, 'PP004', '2022-06-01', 'Setuju'),
(12, 4, 'PP005', '2022-06-01', 'Setuju'),
(13, 4, 'PP006', '2022-06-01', 'Setuju'),
(14, 4, 'PP007', '2022-06-01', 'Ditolak'),
(15, 4, 'PP008', '2022-06-06', 'Meminta'),
(16, 4, 'PP009', '2022-06-06', 'Meminta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `po`
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
-- Dumping data untuk tabel `po`
--

INSERT INTO `po` (`id_po`, `id_user`, `id_permintaanpembelian`, `kode_po`, `tgl_po`, `status_po`) VALUES
(6, 3, 7, 'PO001', '2022-06-01', 'Diterima'),
(7, 3, 10, 'PO002', '2022-06-01', 'Diterima'),
(8, 3, 11, 'PO003', '2022-06-01', 'Diterima'),
(9, 3, 13, 'PO004', '2022-06-01', 'Diterima'),
(10, 3, 12, 'PO005', '2022-06-01', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `kode_supplier` varchar(5) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `kode_supplier`, `nama_supplier`, `alamat_supplier`) VALUES
(5, 'SP001', 'PT Sajiku', 'Jln. Thamrin No. 850, Palu 90856, Maluku '),
(6, 'SP002', 'Indofood', 'Jln. Warga No. 437, Subulussalam 73723, JaBar ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_petugas`
--

CREATE TABLE `user_petugas` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto_user` varchar(100) NOT NULL,
  `level` enum('admin','store','purchasing','gudang','management') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_petugas`
--

INSERT INTO `user_petugas` (`id_user`, `nama`, `jabatan`, `phone`, `email`, `password`, `foto_user`, `level`) VALUES
(1, 'Darsirah', 'Manager', '082311707366', 'admin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'female-3.png', 'admin'),
(2, 'Silvia Wastuti', 'Manager Stores', '087516756155', 'store@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'male-11.png', 'store'),
(3, 'Oni Melani', 'Manager Purchasing', '0270458776', 'purchasing@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'female-1.png', 'purchasing'),
(4, 'Cengkir Ramadan', 'Manager Gudang', '07347864847', 'gudang@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'male-1.png', 'gudang'),
(6, 'Ramadan', 'Manager Gudang', '07347864333', 'management@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1.jpg', 'management');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`,`id_supplier`),
  ADD KEY `barang_ibfk_1` (`id_supplier`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barangkeluar`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_permintaanbarang` (`id_permintaanbarang`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barangmasuk`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_permintaanpembelian` (`id_permintaanpembelian`);

--
-- Indeks untuk tabel `detail_penggunaan`
--
ALTER TABLE `detail_penggunaan`
  ADD PRIMARY KEY (`id_detailpenggunaan`),
  ADD KEY `id_penggunaan` (`id_penggunaan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `detail_permintaanbarang`
--
ALTER TABLE `detail_permintaanbarang`
  ADD PRIMARY KEY (`id_detailpermintaanbarang`),
  ADD KEY `id_permintaanbarang` (`id_permintaanbarang`,`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `detail_permintaanpembelian`
--
ALTER TABLE `detail_permintaanpembelian`
  ADD PRIMARY KEY (`id_detailpermintaanpembelian`),
  ADD KEY `id_permintaanpembelian` (`id_permintaanpembelian`,`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD PRIMARY KEY (`id_penggunaan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  ADD PRIMARY KEY (`id_permintaanbarang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `permintaan_pembelian`
--
ALTER TABLE `permintaan_pembelian`
  ADD PRIMARY KEY (`id_permintaanpembelian`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id_po`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_permintaanpembelian` (`id_permintaanpembelian`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `user_petugas`
--
ALTER TABLE `user_petugas`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barangkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barangmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `detail_penggunaan`
--
ALTER TABLE `detail_penggunaan`
  MODIFY `id_detailpenggunaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `detail_permintaanbarang`
--
ALTER TABLE `detail_permintaanbarang`
  MODIFY `id_detailpermintaanbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `detail_permintaanpembelian`
--
ALTER TABLE `detail_permintaanpembelian`
  MODIFY `id_detailpermintaanpembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penggunaan`
--
ALTER TABLE `penggunaan`
  MODIFY `id_penggunaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  MODIFY `id_permintaanbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `permintaan_pembelian`
--
ALTER TABLE `permintaan_pembelian`
  MODIFY `id_permintaanpembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `po`
--
ALTER TABLE `po`
  MODIFY `id_po` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_petugas`
--
ALTER TABLE `user_petugas`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_petugas` (`id_user`),
  ADD CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`id_permintaanbarang`) REFERENCES `permintaan_barang` (`id_permintaanbarang`);

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_petugas` (`id_user`),
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`id_permintaanpembelian`) REFERENCES `permintaan_pembelian` (`id_permintaanpembelian`);

--
-- Ketidakleluasaan untuk tabel `detail_penggunaan`
--
ALTER TABLE `detail_penggunaan`
  ADD CONSTRAINT `detail_penggunaan_ibfk_1` FOREIGN KEY (`id_penggunaan`) REFERENCES `penggunaan` (`id_penggunaan`),
  ADD CONSTRAINT `detail_penggunaan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `detail_permintaanbarang`
--
ALTER TABLE `detail_permintaanbarang`
  ADD CONSTRAINT `detail_permintaanbarang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `detail_permintaanbarang_ibfk_2` FOREIGN KEY (`id_permintaanbarang`) REFERENCES `permintaan_barang` (`id_permintaanbarang`);

--
-- Ketidakleluasaan untuk tabel `detail_permintaanpembelian`
--
ALTER TABLE `detail_permintaanpembelian`
  ADD CONSTRAINT `detail_permintaanpembelian_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `detail_permintaanpembelian_ibfk_2` FOREIGN KEY (`id_permintaanpembelian`) REFERENCES `permintaan_pembelian` (`id_permintaanpembelian`);

--
-- Ketidakleluasaan untuk tabel `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD CONSTRAINT `penggunaan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_petugas` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  ADD CONSTRAINT `permintaan_barang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_petugas` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `permintaan_pembelian`
--
ALTER TABLE `permintaan_pembelian`
  ADD CONSTRAINT `permintaan_pembelian_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user_petugas` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `po`
--
ALTER TABLE `po`
  ADD CONSTRAINT `po_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_petugas` (`id_user`),
  ADD CONSTRAINT `po_ibfk_2` FOREIGN KEY (`id_permintaanpembelian`) REFERENCES `permintaan_pembelian` (`id_permintaanpembelian`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
