-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Okt 2023 pada 15.07
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesanan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `nasipadang`
--

CREATE TABLE `nasipadang` (
  `id` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pesanan` varchar(255) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nasipadang`
--

INSERT INTO `nasipadang` (`id`, `nama`, `no_telp`, `alamat`, `pesanan`, `file`) VALUES
(16, 'ajeng', '08535243', 'bengkuring', 'nasi ayam 1', '653910ec357ce.png'),
(17, 'Tiara Amanda Zachri', '0972336', 'juanda', 'nasi rendang 10', '653912dc7d877.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `nasipadang`
--
ALTER TABLE `nasipadang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `nasipadang`
--
ALTER TABLE `nasipadang`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
