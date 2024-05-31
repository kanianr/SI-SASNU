-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2024 pada 05.43
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisasnu`
--
CREATE DATABASE IF NOT EXISTS `sisasnu` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sisasnu`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` varchar(10) NOT NULL,
  `nuptk` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `tmt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nuptk`, `nama`, `jk`, `alamat`, `jabatan`, `tmt`) VALUES
('001A', '324868970702', 'Deyasmei Maulud Huda', 'Perempuan', 'JL. Leuwianyar', 'Admin', '2020-02-01'),
('001K', '329849859060', 'Aceng Mubarok', 'Laki-laki', 'LA', 'Kepala Sekolah', '2024-02-02'),
('001O', '234858696002', 'Kania Nadya Rahmah', 'Perempuan', 'JL. Leuwianyar', 'Operator', '2020-02-02'),
('002', '8477668392871', 'Adhiva Dwi Lestari', 'Perempuan', 'Ciamis', 'Guru', '2022-02-03'),
('005', '087654398765', 'Wini Irmawanti', 'Perempuan', 'Cipatujah', 'Guru ', '2024-02-13'),
('006', '736576879499', 'Yasmin Zahirah', 'Perempuan', 'Citapen', 'Guru', '2024-02-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(5) NOT NULL,
  `kode_surat` varchar(20) NOT NULL,
  `nomor_surat` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `pengaju` varchar(40) NOT NULL,
  `kepada` varchar(40) NOT NULL,
  `perihal` varchar(150) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `file` varchar(355) NOT NULL,
  `id_staff` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `kode_surat`, `nomor_surat`, `tanggal`, `pengaju`, `kepada`, `perihal`, `pengirim`, `penerima`, `file`, `id_staff`) VALUES
(1, 'SK-001', '01/02/SMKSNU/2024', '2024-01-03', 'Kajur SMKS NU ', 'Kepsek SMAN 2 Tasikmalaya', 'Undangan kolaborasi', 'Kurir', 'Adhiva Dwi Lestari', 'Surat_Edaran.pdf', '001A'),
(2, 'SK-002', '02/03/SMKSNU/2024', '2024-01-30', 'Bagian Kesiswaan', 'SMPN 2 TASIKMALAYA', 'UDANGAN', 'Kurir ', 'Syifa Haura', 'Surat_Edaran.pdf', '001A'),
(3, 'SK-003', '02/02/SMKSNU/2024', '2024-02-01', 'Kepala Sekolah', 'SMAN 1 Tasikmalaya', 'Undangan Kolaborasi', 'Kurir  ', 'Bu ida (Kesiswaan)', 'Surat_Edaran.pdf', '001O'),
(4, 'SM-004', '002/SMKNU/I/2024', '2024-01-08', 'Kepala Sekolah', 'SMAN PULAU TENGAH', 'SKLB', 'JNT', 'Security SMAN PULAU TENGAH', 'Surat Keluar.pdf', '001A'),
(12345, '54321', '12345', '2024-02-24', 'Kesiswaan', 'DCI', 'Undangan Kolaborasi', 'Kurir (Pak Mamat) ', 'Staff', 'Surat Keluar.pdf', '001A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(5) NOT NULL,
  `kode_surat` varchar(20) NOT NULL,
  `asal_surat` varchar(50) NOT NULL,
  `nomor_surat` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `perihal` varchar(150) NOT NULL,
  `penerima` varchar(40) NOT NULL,
  `file` varchar(355) NOT NULL,
  `id_staff` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `kode_surat`, `asal_surat`, `nomor_surat`, `tanggal`, `kepada`, `perihal`, `penerima`, `file`, `id_staff`) VALUES
(1, 'SM-001', 'SMAN 1 Tasikmalaya', '01/04/SMAN1/2024', '2024-01-03', 'SMKS NU TASIKMALAYA', 'Undangan Kolaborasi', 'Adhiva Dwi Lestari', 'Surat_Edaran.pdf', '001O'),
(2, 'SM-002', 'SMPN 2 Tasikmalaya', '01/02/300/2024', '2024-02-08', 'Kepala Sekolah SMKS NU', 'Undangan Kolaborasi', 'Adhiva Dwi Lestari', 'Surat_Edaran.pdf', '001A'),
(3, 'SM-003', 'SMK Angkasa', '01/02/300/2024', '2024-02-04', 'Kepala Sekolah SMKS NU', 'undangan rapat', 'Adhiva Dwi Lestari', 'Surat_Edaran.pdf', '001O'),
(4, 'SM-004', 'SMK Angkasa', '02/02/SA/2024', '2024-02-08', 'Kepala Sekolah ', 'Undangan Kolaborasi', 'Adhiva Dwi Lestari', 'Surat Masuk.pdf', '001O'),
(5, 'SM-005', 'Bakesbangpol', '400.5.3/037/2024', '2024-01-31', 'Kepala Sekolah SMKS NU', 'Undangan', 'Adhiva Dwi Lestari', 'Surat Masuk.pdf', '001O'),
(7, 'SM-007', 'SMPN 6 Tasikmalaya', '02/02/300/2023', '2024-03-07', 'Kepala Sekolah SMKS NU', 'Undangan Kolaborasi', 'Adhiva Dwi Lestari', 'Surat Masuk.pdf', '001A'),
(12345, '54321', 'DCI', '12345', '2024-02-24', 'Kepala Sekolah SMKS NU', 'Undangan Kolaborasi', 'Adhiva Dwi Lestari', 'Surat Masuk.pdf', '001A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_staff` varchar(10) NOT NULL,
  `nuptk` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_staff`, `nuptk`, `username`, `password`, `level`) VALUES
('001A', '324868970702', 'deyas', '321', 'Admin'),
('001K', '329849859060', 'aceng', '321', 'Kepala Sekolah'),
('001O', '234858696002', 'kania', '321', 'Operator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_staff`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=840914;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
