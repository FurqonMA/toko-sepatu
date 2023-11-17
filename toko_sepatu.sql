-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2023 pada 03.27
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_sepatu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(500) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `olahraga` varchar(120) NOT NULL,
  `brands` varchar(120) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `keterangan`, `olahraga`, `brands`, `harga`, `stok`, `gambar`) VALUES
(29, 'sepatu futsal ortuseight', 'Sepatu Futsal Ortuseight Catalyst Griffin IN - Magenta/Purple/Cyan', 'futsal', 'ortuseight', 399000, 10, 'futsal_ortu13.png'),
(31, 'sepatu basket adidas', 'Adidas Dame 8 Young Dolla', 'basket', 'adidas', 1599000, 8, 'basket_adidas1.png'),
(33, 'sepatu bola adidas', 'Sepatu Bola Adidas Copa Pure.3 FG HQ8984 - Ftwwht/Cblack/Luclem', 'sepak bola', 'adidas', 935000, 9, 'bola_adidas1.png'),
(34, 'sepatu lari adidas', 'Sepatu Running Adidas Galaxy 6 W IE1989 - Dshgry/Arcfus/Lucpnk', 'lari', 'adidas', 725000, 10, 'lari_adidas1.png'),
(35, 'sepatu futsal ortuseight', 'Sepatu Futsal Ortuseight Jogosala Victus - Vermillion Red/Gold', 'futsal', 'ortuseight', 449000, 10, 'futsal_ortu22.png'),
(36, 'sepatu basket adidas', 'Adidas Dame 8 Mr. Incredible', 'basket', 'adidas', 1599000, 10, 'basket_adidas2.png'),
(37, 'sepatu bola adidas', 'Sepatu Bola Adidas X Crazyfast Messi.3 FG IE4078 - Silvmt/Bliblu/Cblack', 'sepak bola', 'adidas', 1189000, 10, 'bola_adidas2.png'),
(38, 'sepatu lari adidas', 'Sepatu Running Adidas Duramo 10 GW4075 - Core Black/Pulse Blue/Impact Orange', 'lari', 'adidas', 765000, 10, 'lari_adidas2.png'),
(39, 'sepatu futsal ortuseight', 'Sepatu Futsal Ortuseight Forte Xcalibur IN - Magenta/Cyan/Black', 'futsal', 'ortuseight', 425000, 10, 'futsal_ortu3.png'),
(40, 'sepatu basket adidas', 'Adidas Trae Unlimited', 'basket', 'adidas', 1399000, 10, 'basket_adidas3.png'),
(41, 'sepatu bola adidas', 'Sepatu Bola Adidas Copa Pure.4 FG GY9082 - Owhite/Sorang/Owhite', 'sepak bola', 'adidas', 679000, 10, 'bola_adidas3.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(8, 'Muhammad Furqon Maulana', 'Jepara, Jawa Tengah', '2023-10-31 12:10:31', '2023-11-01 12:10:31'),
(9, 'Darwin Nunez', 'Liverpool', '2023-10-31 13:37:49', '2023-11-01 13:37:49'),
(10, 'Dominik Szoboszlai', 'Liverpool', '2023-11-02 10:58:55', '2023-11-03 10:58:55'),
(11, 'Muhammad Furqon Maulana', 'Jepara, Jawa Tengah', '2023-11-02 14:45:56', '2023-11-03 14:45:56'),
(14, 'Luis Diaz', 'Colombia', '2023-11-06 11:27:18', '2023-11-07 11:27:18'),
(15, 'Mohamed Salah', 'Mesir', '2023-11-06 11:28:59', '2023-11-07 11:28:59'),
(16, 'Alisson Becker', 'Liverpool', '2023-11-06 11:33:54', '2023-11-07 11:33:54'),
(17, 'affan', 'Jepara', '2023-11-06 12:07:42', '2023-11-07 12:07:42'),
(18, 'Zlatan Ibrahimovic', 'Swedia', '2023-11-15 13:43:32', '2023-11-16 13:43:32'),
(19, 'Zlatan Ibrahimovic', 'Swedia', '2023-11-15 14:13:56', '2023-11-16 14:13:56'),
(20, 'Zlatan Ibrahimovic', 'Swedia', '2023-11-16 08:43:00', '2023-11-17 08:43:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_barang`, `nama_barang`, `jumlah`, `harga`, `pilihan`) VALUES
(6, 8, 25, 'sepatu futsal ortuseight', 1, 279000, ''),
(7, 9, 25, 'sepatu futsal ortuseight', 2, 279000, ''),
(8, 10, 25, 'sepatu futsal ortuseight', 1, 279000, ''),
(9, 10, 26, 'sepatu futsal ortuseight', 1, 280000, ''),
(10, 11, 37, 'sepatu bola adidas', 1, 1189000, ''),
(11, 12, 33, 'sepatu bola adidas', 1, 935000, ''),
(12, 13, 31, 'sepatu basket adidas', 1, 1599000, ''),
(13, 14, 35, 'sepatu futsal ortuseight', 1, 449000, ''),
(14, 15, 35, 'sepatu futsal ortuseight', 1, 449000, ''),
(15, 16, 34, 'sepatu lari adidas', 1, 725000, ''),
(16, 17, 31, 'sepatu basket adidas', 1, 1599000, ''),
(17, 18, 31, 'sepatu basket adidas', 1, 1599000, ''),
(18, 19, 33, 'sepatu bola adidas', 1, 935000, ''),
(19, 20, 31, 'sepatu basket adidas', 1, 1599000, '');

--
-- Trigger `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
   UPDATE tb_barang SET stok = stok-NEW.jumlah
 WHERE id_barang = NEW.id_barang;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', '123', 1),
(2, 'Zlatan Ibrahimovic', 'Zlatan', 'zlatan123', 2),
(3, 'Dominik Szoboszlai', 'szoboszlai', 'dominik123', 2),
(4, 'Muhammad Furqon Maulana', 'furqon', 'furqon123', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
