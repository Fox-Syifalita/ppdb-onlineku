-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Jul 2022 pada 16.17
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `Id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_admin` varchar(255) DEFAULT NULL,
  `id_pendaftar` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_asal_sekolah`
--

CREATE TABLE `tb_asal_sekolah` (
  `id_pendaftar` char(10) DEFAULT NULL,
  `npsn` varchar(10) DEFAULT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_hasil` varchar(30) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_nilai` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `b_indonesia` int(10) NOT NULL,
  `b_inggris` int(10) NOT NULL,
  `matematika` int(10) NOT NULL,
  `id_nilai` varchar(30) DEFAULT NULL,
  `id_pendaftar` char(10) DEFAULT NULL,
  `keterangan` enum('Lulus','Tidak Lulus') DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ortu`
--

CREATE TABLE `tb_ortu` (
  `id_pendaftar` char(10) DEFAULT NULL,
  `nik_ayah` varchar(16) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `pendidikan_ayah` enum('SD','SMP','SMA/SMK Sederajat','S1 Sederajat','S2','S3') DEFAULT NULL,
  `pekerjaan_ayah` enum('Tidak Bekerja','PNS','Wiraswasta','Pegawai Swasta','Buruh','TNI/POLRI','Pekerja Harian Lepas','Pensiun','Dokter','Petani','Peternak') DEFAULT NULL,
  `telepon_ayah` varchar(12) DEFAULT NULL,
  `penghasilan_ayah` enum('< Rp 500.000','Rp 500.000 - Rp 1.500.000','Rp 1.500.000 - Rp 3.500.000','Rp 3.500.000 - Rp 5.000.000','Rp 5.000.000 - Rp 10.000.000','Rp 10.000.000 - Rp 20.000.000','> Rp 20.000.000') DEFAULT NULL,
  `nik_ibu` varchar(16) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `pendidikan_ibu` enum('SD','SMP','SMA/SMK Sederajat','S1 Sederajat','S2','S3') DEFAULT NULL,
  `pekerjaan_ibu` enum('Ibu Rumah Tangga','PNS','Wiraswasta','Pegawai Swasta','Buruh','TNI/POLRI','Pensiun') DEFAULT NULL,
  `telepon_ibu` varchar(12) DEFAULT NULL,
  `penghasilan_ibu` enum('< Rp 500.000','Rp 500.000 - Rp 1.500.000','Rp 1.500.000 - Rp 3.500.000','Rp 3.500.000 - Rp 5.000.000','Rp 5.000.000 - Rp 10.000.000','Rp 10.000.000 - Rp 20.000.000','> Rp 20.000.000') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendaftar`
--

CREATE TABLE `tb_pendaftar` (
  `id_pendaftar` char(10) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `th_ajaran` varchar(9) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `nm_peserta` varchar(50) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `agama` varchar(15) NOT NULL,
  `alamat_peserta` text NOT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `telepon` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nm_petugas` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat_petugas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nm_petugas`, `username`, `password`, `email`, `alamat_petugas`) VALUES
(1, 'Afi', 'admin', '123', 'nafy21@gmail.com', 'Jl. Diponegiri, Desa Wole-wole, Kec. Abipula, Kab. Lacicap');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `tb_pendaftar`
--
ALTER TABLE `tb_pendaftar`
  ADD PRIMARY KEY (`id_pendaftar`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
