-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Sep 2023 pada 17.15
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biliard_predator`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja_billiard`
--

CREATE TABLE `meja_billiard` (
  `id_meja` int(12) NOT NULL,
  `no_meja` int(2) NOT NULL,
  `lantai` int(2) NOT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `meja_billiard`
--

INSERT INTO `meja_billiard` (`id_meja`, `no_meja`, `lantai`, `status`) VALUES
(32, 8, 1, 'Tersedia'),
(33, 7, 1, 'Tersedia'),
(34, 6, 1, 'Tersedia'),
(36, 4, 1, 'Tersedia'),
(37, 3, 1, 'Tersedia'),
(38, 2, 1, 'Tersedia'),
(39, 1, 1, 'Tersedia'),
(42, 9, 1, 'Tersedia'),
(43, 5, 1, 'Tersedia'),
(44, 10, 1, 'Tersedia'),
(45, 11, 1, 'Tersedia'),
(46, 12, 1, 'Tersedia'),
(47, 13, 1, 'Tersedia'),
(48, 14, 1, 'Tersedia'),
(49, 15, 1, 'Tersedia'),
(50, 16, 1, 'Tersedia'),
(51, 17, 2, 'Tersedia'),
(52, 18, 1, 'Tersedia'),
(55, 28, 1, 'Tersedia'),
(56, 27, 1, 'Tersedia'),
(57, 26, 1, 'Tersedia'),
(58, 25, 1, 'Tersedia'),
(59, 24, 1, 'Tersedia'),
(60, 23, 3, 'Tersedia'),
(61, 22, 3, 'Tersedia'),
(62, 21, 1, 'Tersedia'),
(63, 20, 3, 'Tersedia'),
(64, 19, 3, 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `pemesanan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `pemesanan` (
`id_pesanan` int(12)
,`id_pelanggan` int(10) unsigned
,`id_meja` int(12)
,`tanggal_pesanan` date
,`waktu_mulai` varchar(10)
,`waktu_selesai` varchar(10)
,`total_biaya` int(12)
,`nama_pemesanan` varchar(50)
,`status` varchar(12)
,`keterangan` text
,`dp` varchar(5)
,`durasi` varchar(6)
,`metode_pembayaran` varchar(50)
,`bukti_transfer` varchar(200)
,`status_main` varchar(10)
,`no_meja` int(2)
,`lantai` int(2)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(12) NOT NULL,
  `username` varchar(12) DEFAULT NULL,
  `password` varchar(12) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_tlpn` varchar(13) DEFAULT NULL,
  `role` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama`, `alamat`, `no_tlpn`, `role`) VALUES
(1111131, 'Kadek Yudi', '123', 'yudi3456', 'asasadasd', '0867554335', 'boss'),
(1111133, 'Kadek Yudi', '123', 'yude', 'asasadasd', '0867554335', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(12) NOT NULL,
  `id_pelanggan` int(10) UNSIGNED DEFAULT NULL,
  `id_meja` int(12) DEFAULT NULL,
  `tanggal_pesanan` date DEFAULT NULL,
  `waktu_mulai` varchar(10) DEFAULT NULL,
  `waktu_selesai` varchar(10) DEFAULT NULL,
  `total_biaya` int(12) DEFAULT NULL,
  `nama_pemesanan` varchar(50) DEFAULT NULL,
  `status` varchar(12) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `dp` varchar(5) DEFAULT NULL,
  `durasi` varchar(6) DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `bukti_transfer` varchar(200) DEFAULT NULL,
  `status_main` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pelanggan`, `id_meja`, `tanggal_pesanan`, `waktu_mulai`, `waktu_selesai`, `total_biaya`, `nama_pemesanan`, `status`, `keterangan`, `dp`, `durasi`, `metode_pembayaran`, `bukti_transfer`, `status_main`) VALUES
(911318, 11, 39, '2023-09-05', '09:00', NULL, 30000, 'hf', NULL, NULL, '50%', '1', 'BCA 08229603 a.n. I KADEK YUDIANTORO', '33.UKDW.png', NULL),
(911319, 11, 38, '2023-09-05', '09:00', NULL, 30000, 'hf', NULL, NULL, '50%', '1', 'BCA 08229603 a.n. I KADEK YUDIANTORO', '33.UKDW.png', NULL),
(911320, 11, 39, '2023-09-05', '10:00', NULL, 30000, 'hf', NULL, NULL, '50%', '1', 'BCA 08229603 a.n. I KADEK YUDIANTORO', '33.UKDW.png', NULL),
(911321, 11, 39, '2023-09-06', '18:00', NULL, 30000, 'hf', NULL, NULL, '50%', '1', 'BCA 08229603 a.n. I KADEK YUDIANTORO', '33.UKDW.png', NULL),
(911322, 11, 42, '2023-09-06', '09:00', NULL, 0, 'hf', NULL, NULL, '50%', '1', 'BCA 08229603 a.n. I KADEK YUDIANTORO', '33.UKDW.png', NULL),
(911323, 11, 39, '2023-09-06', '23:00', NULL, 30000, 'hf', NULL, NULL, '50%', '1', 'BCA 08229603 a.n. I KADEK YUDIANTORO', '33.UKDW.png', NULL),
(911324, 11, 39, '2023-09-06', '21:00', NULL, 60000, 'hf', NULL, NULL, '50%', '2', 'BCA 08229603 a.n. I KADEK YUDIANTORO', '33.UKDW.png', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlpn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin','Karyawan','Pengguna') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `username_verified_at`, `password`, `alamat`, `no_tlpn`, `role`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'yudaa', 'yud1233', NULL, '$2y$10$C8Y.4BDQsrxW5P9rBAd31eq7pfREk1HeVTFzXcOXr8bRoN1uf/gUS', 'kue', '082296034309', 'Admin', '72190296.jpg', '2LBMpSKWgFvVC0T6bGkx3M28aihTppRb6W9pUHfE6I7xhtz2MV6mhRlihgcv', '2023-08-23 03:45:49', '2023-08-23 03:45:49'),
(3, 'dekyudi', 'pengguna', NULL, '$2y$10$vjCs.ChILPvnHIHjxMC1eOslwm2eKwzVjeKjgzn87v1RzfjTEQ0sK', 'kue', '082296034309', 'Pengguna', 'd.jpg', 'UDAZQro1bhmg97WGGxY5wEaVZYFIUGUFiYRnhjYXqAsSfTSG2LgTiTT1JDQN', '2023-08-24 09:02:53', '2023-08-24 09:02:53'),
(8, 'jun24', 'junaidi0910', NULL, '$2y$10$YB3t0SgmBlPVxPs2JFtmq.bhXrbJBwhr8uvh1mcrXo42c5nuVpIOu', 'abcd', '0867554335', 'Pengguna', '13508-kementan.jpg', NULL, NULL, NULL),
(10, 'kadek yudi', 'yudi24', NULL, '$2y$10$mecALg8/nqhgSdMLPJ0Nm.th1g04Regmt7Bdb.ulICRvpUGdQ7r56', 'jln doktor sutomo', '082296034309', 'Karyawan', NULL, NULL, NULL, NULL),
(11, 'hf', 'p123', NULL, '$2y$10$gxixdCZ6SV5NB0VhTctuq.KcneYHhZvjbmadp5TdBITIH/7u..iUi', 'asasadasd', '0867554335', 'Pengguna', NULL, NULL, NULL, NULL),
(13, 'karyawan', 'karyawan1', NULL, '$2y$10$Y6i/7wla826SAt4HaXud8uUiy7iAZ4lAD1X/s4y3nZZgZ.nKavEnG', 'jln doktor sutomo', '0867554335', 'Karyawan', '278206664_325934269524671_8229898424160877446_n.webp.jpeg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur untuk view `pemesanan`
--
DROP TABLE IF EXISTS `pemesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pemesanan`  AS SELECT `pesanan`.`id_pesanan` AS `id_pesanan`, `pesanan`.`id_pelanggan` AS `id_pelanggan`, `pesanan`.`id_meja` AS `id_meja`, `pesanan`.`tanggal_pesanan` AS `tanggal_pesanan`, `pesanan`.`waktu_mulai` AS `waktu_mulai`, `pesanan`.`waktu_selesai` AS `waktu_selesai`, `pesanan`.`total_biaya` AS `total_biaya`, `pesanan`.`nama_pemesanan` AS `nama_pemesanan`, `pesanan`.`status` AS `status`, `pesanan`.`keterangan` AS `keterangan`, `pesanan`.`dp` AS `dp`, `pesanan`.`durasi` AS `durasi`, `pesanan`.`metode_pembayaran` AS `metode_pembayaran`, `pesanan`.`bukti_transfer` AS `bukti_transfer`, `pesanan`.`status_main` AS `status_main`, `meja_billiard`.`no_meja` AS `no_meja`, `meja_billiard`.`lantai` AS `lantai` FROM (`pesanan` join `meja_billiard` on(`pesanan`.`id_meja` = `meja_billiard`.`id_meja`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `meja_billiard`
--
ALTER TABLE `meja_billiard`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `meja_billiard` (`id_meja`),
  ADD KEY `users` (`id_pelanggan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `meja_billiard`
--
ALTER TABLE `meja_billiard`
  MODIFY `id_meja` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1111134;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=911325;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `meja_billiard` FOREIGN KEY (`id_meja`) REFERENCES `meja_billiard` (`id_meja`),
  ADD CONSTRAINT `users` FOREIGN KEY (`id_pelanggan`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
