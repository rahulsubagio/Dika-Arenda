-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2021 pada 07.32
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
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penyusutan`
--

CREATE TABLE `detail_penyusutan` (
  `id_produk` int(11) NOT NULL,
  `id_penyusutan` int(11) NOT NULL,
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
('C1', 1, '2021-04-01', -1500000, 1563800),
('C2', 2, '2021-04-01', 0, 0),
('C3', 3, '2021-04-01', 0, -2160000),
('C4', 6, '2021-04-01', 0, 4200);

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
-- Struktur dari tabel `neraca`
--

CREATE TABLE `neraca` (
  `id_neraca` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `laba_rugi` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `neraca_penjualan`
--

CREATE TABLE `neraca_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_neraca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `neraca_transaksi`
--

CREATE TABLE `neraca_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_neraca` int(11) NOT NULL
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
  `code` varchar(10) NOT NULL,
  `tanggal` datetime NOT NULL,
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

INSERT INTO `penjualan` (`id_penjualan`, `code`, `tanggal`, `ekor`, `kg`, `harga`, `a_kompensasi`, `total`, `pembayaran`) VALUES
(1, 'C2', '2021-04-09 00:00:00', 5, 5.1, 26000, 0, 132600, 132600),
(2, 'C4', '2021-04-09 21:32:09', 10, 11, 21000, 0, 231000, 235200),
(3, 'C1', '2021-04-09 22:15:52', 10, 11.2, 22000, 0, 246400, 0),
(4, 'U1', '2021-04-10 09:01:13', 10, 11.8, 26000, 0, 306800, 306800),
(5, 'C1', '2021-04-16 12:36:14', 7, 7.3, 26000, 0, 189800, 0),
(6, 'U2', '2021-04-24 10:10:52', 30, 31.3, 25000, 0, 782500, 0);

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `stok_ekor` int(100) NOT NULL,
  `stok_kg` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 1071000),
(2, 0),
(3, -2160000),
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
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD KEY `fk_detail_penjualan` (`id_penjualan`),
  ADD KEY `fk_detail_penjualan_produk` (`id_produk`);

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
-- Indeks untuk tabel `neraca`
--
ALTER TABLE `neraca`
  ADD PRIMARY KEY (`id_neraca`);

--
-- Indeks untuk tabel `neraca_penjualan`
--
ALTER TABLE `neraca_penjualan`
  ADD KEY `fk_neraca_penjualan` (`id_penjualan`),
  ADD KEY `fk_neraca_p` (`id_neraca`);

--
-- Indeks untuk tabel `neraca_transaksi`
--
ALTER TABLE `neraca_transaksi`
  ADD KEY `fk_transaksi_neraca` (`id_transaksi`),
  ADD KEY `fk_neraca` (`id_neraca`);

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
  ADD KEY `fk_code_penjualan` (`code`);

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
-- AUTO_INCREMENT untuk tabel `neraca`
--
ALTER TABLE `neraca`
  MODIFY `id_neraca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penyusutan`
--
ALTER TABLE `penyusutan`
  MODIFY `id_penyusutan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT;

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
-- Ketidakleluasaan untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `fk_detail_penjualan` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detail_penjualan_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Ketidakleluasaan untuk tabel `neraca_penjualan`
--
ALTER TABLE `neraca_penjualan`
  ADD CONSTRAINT `fk_neraca_p` FOREIGN KEY (`id_neraca`) REFERENCES `neraca` (`id_neraca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_neraca_penjualan` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `neraca_transaksi`
--
ALTER TABLE `neraca_transaksi`
  ADD CONSTRAINT `fk_neraca` FOREIGN KEY (`id_neraca`) REFERENCES `neraca` (`id_neraca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksi_neraca` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_code_penjualan` FOREIGN KEY (`code`) REFERENCES `customer` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

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
