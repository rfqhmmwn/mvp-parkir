-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Jan 2026 pada 03.20
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id` int NOT NULL,
  `slot_id` int NOT NULL,
  `jenis` enum('mobil(5000)','motor(2000)') COLLATE utf8mb4_general_ci NOT NULL,
  `plat` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jam_masuk` datetime DEFAULT NULL,
  `jam_keluar` datetime DEFAULT NULL,
  `status` enum('selesai','belum') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'belum',
  `durasi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id`, `slot_id`, `jenis`, `plat`, `jam_masuk`, `jam_keluar`, `status`, `durasi`) VALUES
(7, 1, 'motor(2000)', 'jolasjfd', '2026-01-26 06:58:17', '2026-01-26 06:58:36', 'selesai', '0'),
(8, 1, 'motor(2000)', 'pjad9i1309', '2026-01-26 07:00:16', '2026-01-26 07:05:30', 'selesai', '0'),
(9, 1, 'motor(2000)', 'pjad9i1309', '2026-01-26 07:06:29', '2026-01-31 07:06:33', 'selesai', '120'),
(10, 1, 'mobil(5000)', 'lkjaldja', '2026-01-26 07:09:07', '2026-01-26 07:10:01', 'selesai', '00:00:01'),
(11, 1, 'mobil(5000)', 'jolasjfd', '2026-01-26 07:20:26', '2026-01-26 09:21:54', 'selesai', '2'),
(12, 1, 'mobil(5000)', 'jolasjfd', '2026-01-26 07:24:01', '2026-01-26 09:28:14', 'selesai', '2'),
(14, 2, 'motor(2000)', 'kjadjad', '2026-01-26 07:26:02', '2026-01-26 09:50:00', 'selesai', '2'),
(15, 1, 'mobil(5000)', 'pjad9i1309', '2026-01-26 07:33:19', NULL, 'belum', ''),
(16, 3, 'mobil(5000)', 'pjad9i1309', '2026-01-26 07:34:12', NULL, 'belum', ''),
(17, 4, 'mobil(5000)', 'jolasjfd', '2026-01-26 07:36:12', NULL, 'belum', ''),
(18, 5, 'motor(2000)', 'jolasjfd', '2026-01-26 07:43:31', NULL, 'belum', ''),
(19, 6, 'motor(2000)', 'jolasjfd', '2026-01-26 07:44:03', NULL, 'belum', ''),
(20, 7, 'motor(2000)', 'jolasjfd', '2026-01-26 07:45:30', NULL, 'belum', ''),
(21, 8, 'mobil(5000)', 'pjad9i1309', '2026-01-26 07:49:48', NULL, 'belum', ''),
(22, 2, 'mobil(5000)', 'pjad9i1309', '2026-01-26 08:54:35', NULL, 'belum', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slot`
--

CREATE TABLE `slot` (
  `id` int NOT NULL,
  `nomer` int NOT NULL,
  `status` enum('tersedia','tidak') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `slot`
--

INSERT INTO `slot` (`id`, `nomer`, `status`) VALUES
(1, 1, 'tidak'),
(2, 2, 'tidak'),
(3, 3, 'tidak'),
(4, 4, 'tidak'),
(5, 5, 'tidak'),
(6, 6, 'tidak'),
(7, 7, 'tidak'),
(8, 8, 'tidak'),
(9, 9, 'tersedia'),
(10, 10, 'tersedia'),
(11, 11, 'tersedia'),
(12, 12, 'tersedia'),
(13, 13, 'tersedia'),
(14, 14, 'tersedia'),
(15, 15, 'tersedia'),
(16, 16, 'tersedia'),
(17, 17, 'tersedia'),
(18, 18, 'tersedia'),
(19, 19, 'tersedia'),
(20, 20, 'tersedia'),
(21, 21, 'tersedia'),
(22, 22, 'tersedia'),
(23, 23, 'tersedia'),
(24, 24, 'tersedia'),
(25, 25, 'tersedia'),
(26, 26, 'tersedia'),
(27, 27, 'tersedia'),
(28, 28, 'tersedia'),
(29, 29, 'tersedia'),
(30, 30, 'tersedia');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slot_id` (`slot_id`);

--
-- Indeks untuk tabel `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `slot`
--
ALTER TABLE `slot`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`slot_id`) REFERENCES `slot` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
