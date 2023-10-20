-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2023 pada 15.38
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seblak_nda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_detail_pesan` int(11) NOT NULL,
  `id_pemesanan` varchar(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `qty_pesan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(11) NOT NULL,
  `id_menu` varchar(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_diskon` varchar(50) DEFAULT NULL,
  `diskon` varchar(50) DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `member` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `id_menu`, `id_user`, `nama_diskon`, `diskon`, `tgl_selesai`, `member`) VALUES
(1, '1', 1, 'Sale in the day!', '5', '2023-11-30', 1),
(2, '2', 1, 'sale!', '3', '2023-10-26', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id_kritik_saran` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `kritik_saran` text DEFAULT NULL,
  `time_kritik_saran` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kritik_saran`
--

INSERT INTO `kritik_saran` (`id_kritik_saran`, `id_pelanggan`, `id_menu`, `kritik_saran`, `time_kritik_saran`) VALUES
(1, 1, NULL, 'ok', NULL),
(2, 1, NULL, 'ok', '2023-05-10 01:08:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) DEFAULT NULL,
  `harga_menu` varchar(50) DEFAULT NULL,
  `stok_menu` varchar(50) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga_menu`, `stok_menu`, `gambar`, `deskripsi`) VALUES
(1, 'Seblak Kerupuk Daun Jeruk', '17000', '123', 'WhatsApp_Image_2023-10-17_at_15_42_57_70e6d1361.jpg', 'Kerupuk bawang ekstra daun jeruk'),
(2, 'Seblak Kerupuk Original', '18000', '343', 'WhatsApp_Image_2023-10-17_at_15_42_57_6ffaa2211.jpg', 'Kerupuk Orginal Level Pedes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `jk_pelanggan` varchar(20) DEFAULT NULL,
  `no_hp_pelanggan` varchar(15) DEFAULT NULL,
  `username_pelanggan` varchar(50) DEFAULT NULL,
  `password_pelanggan` varchar(50) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `level_member` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jk_pelanggan`, `no_hp_pelanggan`, `username_pelanggan`, `password_pelanggan`, `point`, `level_member`) VALUES
(1, 'elsa', 'perempuan', '089192819281', 'elsa', '12341234', 440, 3),
(2, 'Ahmad Hadi', 'Laki - Laki', '089987654541', 'ahmad', 'ahmadhadi', 0, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `tgl_pesan` date DEFAULT NULL,
  `total_pesan` bigint(20) DEFAULT NULL,
  `status_pesan` int(11) DEFAULT NULL,
  `status_pembayaran` int(11) DEFAULT NULL,
  `bukti_pembayaran` text DEFAULT NULL,
  `time_pesan` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) DEFAULT NULL,
  `ongkir` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `nama_kecamatan`, `ongkir`) VALUES
(1, 'Ciawigebang', '15000'),
(2, 'Cigugur', '7000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `alamat_user` text DEFAULT NULL,
  `jk_user` varchar(15) DEFAULT NULL,
  `username_user` varchar(50) DEFAULT NULL,
  `pass_user` varchar(50) DEFAULT NULL,
  `level_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat_user`, `jk_user`, `username_user`, `pass_user`, `level_user`) VALUES
(1, 'Admin', 'Kuningan, Jawa Barat', 'Laki - Laki', 'admin', 'admin', 1),
(2, 'Owner', 'Kuningan, Jawa Barat', 'Laki - Laki', 'owner', 'owner', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_detail_pesan`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indeks untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id_kritik_saran`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_detail_pesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id_kritik_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
