-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Nov 2023 pada 11.43
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
-- Struktur dari tabel `tb_rincian`
--

CREATE TABLE `tb_rincian` (
  `no_order` varchar(100) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_setting`
--

CREATE TABLE `tb_setting` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(255) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `alamat_toko` text DEFAULT NULL,
  `no_telpon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_setting`
--

INSERT INTO `tb_setting` (`id`, `nama_toko`, `lokasi`, `alamat_toko`, `no_telpon`) VALUES
(1, 'AthleticXpress', 163, 'Jl. Raya Kelet - Bangsri, Kelet, Kec. Keling, Kabupaten Jepara, Jawa Tengah', '08123456789');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `no_order` varchar(100) NOT NULL,
  `tgl_order` date NOT NULL DEFAULT current_timestamp(),
  `nama_penerima` varchar(100) DEFAULT NULL,
  `provinsi_penerima` varchar(100) DEFAULT NULL,
  `kota_penerima` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(15) DEFAULT NULL,
  `no_telp` varchar(100) DEFAULT NULL,
  `ekspedisi` varchar(100) DEFAULT NULL,
  `total_pesanan` int(11) DEFAULT NULL,
  `status_bayar` int(11) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(100) DEFAULT NULL,
  `nama_bank` varchar(100) DEFAULT NULL,
  `no_rek` varchar(100) DEFAULT NULL,
  `status_order` int(11) DEFAULT NULL,
  `no_resi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `no_order`, `tgl_order`, `nama_penerima`, `provinsi_penerima`, `kota_penerima`, `alamat`, `kode_pos`, `no_telp`, `ekspedisi`, `total_pesanan`, `status_bayar`, `bukti_bayar`, `atas_nama`, `nama_bank`, `no_rek`, `status_order`, `no_resi`) VALUES
(33, NULL, 'ORDER3157', '2023-11-18', 'Roberto Firmino', '10', '209', 'Tanjung Karang', '12345', '08123456', 'jne', 0, 0, NULL, NULL, NULL, NULL, 0, NULL),
(34, 5, 'ORDER1030', '2023-11-18', 'Mohamed Salah', '10', '163', 'Keling', '12345', '08123456', 'jne', 0, 0, NULL, NULL, NULL, NULL, 0, NULL),
(35, 2, 'ORDER9160', '2023-11-18', 'Zlatan Ibrahimovic', '10', '209', 'Tanjung Karang', '12345', '08123456', 'jne', 0, 0, NULL, NULL, NULL, NULL, 0, NULL),
(36, 2, '655894aa765a9', '2023-11-18', 'Zlatan Ibrahimovic', '10', '163', 'Keling', '12345', '08123456', 'jne', 399000, 0, NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', '123', 1),
(2, 'Zlatan Ibrahimovic', 'Zlatan', 'zlatan123', 2),
(3, 'Dominik Szoboszlai', 'szoboszlai', 'dominik123', 2),
(4, 'Muhammad Furqon Maulana', 'furqon', 'furqon123', 2),
(5, 'Mohamed Salah', 'mosalah', '123', 2),
(6, 'Roberto Firmino', 'firmino', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
