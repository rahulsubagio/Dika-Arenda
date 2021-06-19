-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2021 pada 15.56
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dika-arenda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `code` varchar(10) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`code`, `nama_customer`, `alamat`, `status`) VALUES
('C1', 'Budi', 'Gaten', 'customer'),
('C2', 'Siti', 'Puluhdadi', 'customer'),
('C3', 'Gondrong', 'Giwangan', 'customer'),
('C4', 'Sate', 'Mundu', 'customer'),
('U1', 'Umum', 'btn', 'umum'),
('U2', 'Marsih', 'Saren', 'umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penyusutan`
--

CREATE TABLE `detail_penyusutan` (
  `id_produk` int(11) NOT NULL,
  `id_penyusutan` int(11) NOT NULL,
  `ayam_masuk_ekor` int(11) NOT NULL,
  `ayam_masuk_kg` float NOT NULL,
  `mati_kandang_ekor` int(11) NOT NULL,
  `mati_kandang_kg` float NOT NULL,
  `mati_armada_ekor` int(11) NOT NULL,
  `mati_armada_kg` float NOT NULL,
  `mati_rpa_ekor` int(11) NOT NULL,
  `mati_rpa_kg` float NOT NULL,
  `admin_ekor` int(11) NOT NULL,
  `admin_kg` float NOT NULL,
  `riil_ekor` int(11) NOT NULL,
  `riil_kg` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_penyusutan`
--

INSERT INTO `detail_penyusutan` (`id_produk`, `id_penyusutan`, `ayam_masuk_ekor`, `ayam_masuk_kg`, `mati_kandang_ekor`, `mati_kandang_kg`, `mati_armada_ekor`, `mati_armada_kg`, `mati_rpa_ekor`, `mati_rpa_kg`, `admin_ekor`, `admin_kg`, `riil_ekor`, `riil_kg`) VALUES
(1, 1, 0, 0, 7, 7, 5, 5.5, 3, 4.5, 2000, 2106.7, 1957, 2087.5),
(2, 1, 0, 0, 7, 7, 5, 5.5, 3, 4.5, 2000, 2106.7, 0, 0),
(4, 3, 1111, 1111, 1, 1.1, 1, 1.1, 1, 1.1, 1110, 1110.1, 1101, 1101.1),
(6, 4, 1111, 1112, 2, 2, 2, 2, 2, 2, 1105, 1106, 1100, 1100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_rekening`
--

CREATE TABLE `detail_rekening` (
  `code` varchar(10) NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `saldo_awal` int(11) NOT NULL,
  `saldo_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_rekening`
--

INSERT INTO `detail_rekening` (`code`, `id_rekening`, `tanggal`, `saldo_awal`, `saldo_akhir`) VALUES
('C1', 1, '2021-04-01', 1500000, 360300),
('C2', 2, '2021-04-01', 0, 0),
('C3', 3, '2021-04-01', 0, -2160000),
('C4', 6, '2021-04-01', 0, 4200),
('C1', 1, '2021-05-01', 360300, 360300),
('C2', 2, '2021-05-01', 0, -36000),
('C3', 3, '2021-05-01', -2160000, 1205440),
('C4', 6, '2021-05-01', 4200, 4200),
('C1', 1, '2021-06-01', 360300, 279500),
('C2', 2, '2021-06-01', -36000, -42200),
('C3', 3, '2021-06-01', 1205440, 37840),
('C4', 6, '2021-06-01', 4200, 4200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `ekor` int(11) NOT NULL,
  `kg` float NOT NULL,
  `harga` int(11) NOT NULL,
  `a_kompensasi` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_produk`, `code`, `tanggal`, `ekor`, `kg`, `harga`, `a_kompensasi`, `total`, `pembayaran`) VALUES
(2, 6, 'C1', '2021-06-18', 12, 12, 24000, 0, 288000, 250000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyusutan`
--

CREATE TABLE `penyusutan` (
  `id_penyusutan` int(11) NOT NULL,
  `jumlah_ekor` int(11) NOT NULL,
  `jumlah_kg` int(11) NOT NULL,
  `persentase` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penyusutan`
--

INSERT INTO `penyusutan` (`id_penyusutan`, `jumlah_ekor`, `jumlah_kg`, `persentase`) VALUES
(1, 15, 17, 0.04),
(3, 3, 3, 99.919),
(4, 6, 6, 99.4604);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `stok_ekor` int(100) NOT NULL,
  `stok_kg` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `tanggal`, `stok_ekor`, `stok_kg`) VALUES
(1, '2021-06-02', 2000, 2106.7),
(2, '2021-06-03', 1500, 1639.8),
(3, '2021-06-15', 1200, 1230.8),
(4, '2021-06-16', 1200, 1230.8),
(5, '2021-06-17', 1200, 1210),
(6, '2021-06-18', 1240, 1250.6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `saldo_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `saldo_akhir`) VALUES
(1, -8300),
(2, -42200),
(3, 37840),
(6, 4200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `jenis_transaksi` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `ekor` int(11) NOT NULL,
  `kg` float NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(11) NOT NULL,
  `nama_vendor` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`code`);

--
-- Indeks untuk tabel `detail_penyusutan`
--
ALTER TABLE `detail_penyusutan`
  ADD KEY `fk_penyusutan_produk` (`id_produk`),
  ADD KEY `fk_penyusutan` (`id_penyusutan`);

--
-- Indeks untuk tabel `detail_rekening`
--
ALTER TABLE `detail_rekening`
  ADD KEY `fk_code` (`code`),
  ADD KEY `fk_rekening` (`id_rekening`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `fk_detail_transaksi` (`id_transaksi`),
  ADD KEY `fk_detail_transaksi_produk` (`id_produk`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `fk_code_penjualan` (`code`),
  ADD KEY `fk_produk_penjualan` (`id_produk`);

--
-- Indeks untuk tabel `penyusutan`
--
ALTER TABLE `penyusutan`
  ADD PRIMARY KEY (`id_penyusutan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_vendor` (`id_vendor`),
  ADD KEY `fk_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penyusutan`
--
ALTER TABLE `penyusutan`
  MODIFY `id_penyusutan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_penyusutan`
--
ALTER TABLE `detail_penyusutan`
  ADD CONSTRAINT `fk_penyusutan` FOREIGN KEY (`id_penyusutan`) REFERENCES `penyusutan` (`id_penyusutan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_penyusutan_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_rekening`
--
ALTER TABLE `detail_rekening`
  ADD CONSTRAINT `fk_code` FOREIGN KEY (`code`) REFERENCES `customer` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rekening` FOREIGN KEY (`id_rekening`) REFERENCES `rekening` (`id_rekening`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `fk_detail_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detail_transaksi_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_code_penjualan` FOREIGN KEY (`code`) REFERENCES `customer` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produk_penjualan` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vendor` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id_vendor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
