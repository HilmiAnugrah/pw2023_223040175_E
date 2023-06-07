-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 07 Jun 2023 pada 01.16
-- Versi server: 8.0.33
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nrp` char(9) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES
(77, 'Hilmi Anugrah Bela Negara', '223040175', 'hilmi@mail.com', 'INFORMATIKA', '647afd2f10be2.png'),
(78, 'Annisa Salma Nabila ', '223040175', 'annisa@mail.com', 'BAHASA ARAB', 'annisa.jpg'),
(79, 'Lala', '223040165', 'lala@mail.com', 'PANAGAN', 'lala.png'),
(80, 'Ilman Hanifa', '223040155', 'ilman@mail.com', 'MESIN', 'ilman.png'),
(85, 'Narapati Keysya', '223040133', 'narapati@mail.com', 'INFORMATIKA', 'narapati.png'),
(86, 'Naufal Sayyid', '223040177', 'naufal@mail.com', 'MESIN', 'naufal.png'),
(87, 'Tegar Samudera', '223040185', 'tegar@mail.com', 'EKONOMI', 'tegar.png'),
(89, 'Hilmi', '223040180', 'hilmi@mail.com', 'PANGAN', '647af4d85680b.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'hilmianugrah', '$2y$10$hAWJro7ZGLPiW.T3YVsNxeg78k/O3qqNxNnPxywTiyOYVubrDsU3i'),
(39, 'hilmi', '$2y$10$7DrN501RzEgoNH.aQ.3rFOk.umaUia99OV7NB0.NOB/e.9Vot03Ru'),
(40, 'hayde', '$2y$10$0V8paRdNfnXkcNxukb21le7MSyAAJYjz0dVYLJhJXP9HeM9kly.gS'),
(41, 'hilmi anugrah', '$2y$10$LHiWauKyt2C/O8Orim9dGehpA66im6w2rbtzWjlNzC1BrKpn8VD5q');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
