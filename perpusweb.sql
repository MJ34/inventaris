-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Agu 2022 pada 04.18
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpusweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(20) DEFAULT NULL,
  `id_kategori` varchar(20) DEFAULT NULL,
  `id_penerbit` varchar(20) DEFAULT NULL,
  `id_rak` varchar(20) DEFAULT NULL,
  `judul` varchar(60) DEFAULT NULL,
  `pengarang` varchar(60) DEFAULT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `jmlhal` int(4) DEFAULT NULL,
  `jmlbuku` int(4) DEFAULT NULL,
  `tahun` int(5) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL,
  `foto` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `id_penerbit`, `id_rak`, `judul`, `pengarang`, `isbn`, `jmlhal`, `jmlbuku`, `tahun`, `sinopsis`, `foto`) VALUES
('B0001', 'K0001', 'P0002', 'Rak-01', 'Lancar JavaScript', 'Jubile Enterprice', '12345678', 140, 56, 2019, '-', 'lancar_javascript.jpg'),
('B0002', 'K0001', 'P0002', 'Rak-01', 'Belajar Otodidak CodeIgniter', 'Budi Raharjo', '12345679', 130, 61, 2020, '-', 'belajar_codeigniter.jpg'),
('B0003', 'K0001', 'P0002', 'Rak-01', 'Pro PHP & Jquery 7 Hari', 'WARDANA', '12345681', 100, 15, 2020, '-', 'web_profesional_dengan_php_jquery.jpg'),
('B0004', 'K0006', 'P0004', 'Rak-04', 'Otodidak Web Programming', 'Muhammad Ibnu Sa\'ad', '123523453424', 100, 20, 2019, '-', 'ID_OWP2020MTH01WP.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_keliling`
--

CREATE TABLE `buku_keliling` (
  `id` varchar(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `asal` varchar(50) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `pengarang` varchar(100) DEFAULT NULL,
  `penanggungjawab` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `jumlahjudul` varchar(5) DEFAULT NULL,
  `jumlaheks` varchar(10) DEFAULT NULL,
  `no_inventaris` varchar(10) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku_keliling`
--

INSERT INTO `buku_keliling` (`id`, `tanggal`, `asal`, `judul`, `pengarang`, `penanggungjawab`, `kota`, `penerbit`, `tahun`, `jumlahjudul`, `jumlaheks`, `no_inventaris`, `foto`) VALUES
('BK0001', '2022-08-19', 'budi', 'Sang senja', 'Ismail', 'airlangga', 'Majapahit', 'Widi P', '2', '1', '1', '101010B', 'book.png'),
('BK0002', '2022-08-17', 'budi', 'Pemprograma framework', 'abdul kadir', 'prof. irvan', 'Denpasar', 'Radhian Sobarna', '8', '1', '1', '101010', 'book.png'),
('BK0003', '2022-08-11', 'budi', 'Sang senja', 'iwan', 'kodam', 'Demak', 'Radhian Sobarna', '11', '1', '1', '101010A', 'book.png'),
('BK0004', '2022-08-05', 'budi', 'budalimo', 'iwan', 'nasnck', 'Majapahit', 'Ria Ricis', '2', '2', '2', '101010A', 'book.png'),
('BK0005', '2022-08-19', 'ncjsbjb', 'jbyugytf', 'assda', 'jc', 'hghgggyftdtd', 'Widi P', '3', '3', '3', '101010A', 'palidasi.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hibah`
--

CREATE TABLE `hibah` (
  `id` varchar(6) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `asal` varchar(50) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `pengarang` varchar(100) DEFAULT NULL,
  `penanggungjawab` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `jumlahjudul` varchar(5) DEFAULT NULL,
  `jumlaheks` varchar(10) DEFAULT NULL,
  `no_inventaris` varchar(10) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hibah`
--

INSERT INTO `hibah` (`id`, `tanggal`, `asal`, `judul`, `pengarang`, `penanggungjawab`, `kota`, `penerbit`, `tahun`, `jumlahjudul`, `jumlaheks`, `no_inventaris`, `foto`) VALUES
('H0001', '2022-08-24', 'kmknk', 'Sang senja', 'Burhan hanif', 'airlangga', 'Denpasar', 'Boy William', '1', '2', '1', '101010B', 'AAAAA3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(20) DEFAULT NULL,
  `kategori` varchar(40) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `keterangan`) VALUES
('K0001', 'Programing', ''),
('K0002', 'Sains', ''),
('K0004', 'Pendidikan', ''),
('K0005', 'Pemula', ''),
('K0006', 'Informatika', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(40) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `notelp` varchar(13) DEFAULT NULL,
  `jk` varchar(30) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `tgllahir` varchar(50) DEFAULT NULL,
  `umur` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_lengkap`, `notelp`, `jk`, `tempat`, `tgllahir`, `umur`, `alamat`, `foto`) VALUES
('P-0001', 'Muhammad Irvan Ali', '08976391220', 'Laki-laki', 'Demak', '08/17/2022', '21', 'Demak', 'ch_bgs1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` varchar(6) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `asal` varchar(50) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `pengarang` varchar(100) DEFAULT NULL,
  `penanggungjawab` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `jumlahjudul` varchar(5) DEFAULT NULL,
  `jumlaheks` varchar(10) DEFAULT NULL,
  `no_inventaris` varchar(10) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `tanggal`, `asal`, `judul`, `pengarang`, `penanggungjawab`, `kota`, `penerbit`, `tahun`, `jumlahjudul`, `jumlaheks`, `no_inventaris`, `foto`) VALUES
('P0002', '2022-08-10', 'budi', 'Pemprograma framework', 'Burhan hanif', 'kodam', 'Majapahit', 'Boy William', '2', '2', '2', '101010A', 'AAAAA.jpg'),
('P0003', '2022-08-19', 'ncjsbjb', 'Pemprograma framework', 'assda', 'prof.', 'msfecj', 'Widi P', '11', '11', '1', '101010B', 'book.png'),
('P0004', '2022-08-19', 'ghghg', 'Pemprograma framework 12', 'iwan', 'jc', 'KUDUS', 'Radhian Sobarna', '1', '1', '1', '101010B', 'book.png'),
('P0005', '2022-08-12', 'ghghg', 'Sang senja', 'assda', 'prof. irvan', 'Demak', 'Radhian Sobarna', '1', '1', '1', '101010B', 'Screenshot_2022-07-01_082824.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` varchar(20) DEFAULT NULL,
  `penerbit` varchar(60) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `penerbit`, `keterangan`) VALUES
('P0001', 'Ria Ricis', ''),
('P0002', 'Boy William', ''),
('P0003', 'Radhian Sobarna', ''),
('P0004', 'Widi P', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id_pengadaan` varchar(10) DEFAULT NULL,
  `id_buku` varchar(60) DEFAULT NULL,
  `asal_buku` varchar(60) DEFAULT NULL,
  `jml` int(4) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `tgl` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `id_buku`, `asal_buku`, `jml`, `ket`, `tgl`) VALUES
('PNG0001', 'B0003', 'Sumedang', 5, '-', '2020-04-15'),
('PNG0002', 'B0002', 'Sumedang', 6, '-', '2020-04-22'),
('PNG0003', 'B0001', 'Sumedang', 6, '-', '2020-04-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` varchar(20) NOT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL,
  `notelp` varchar(13) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `level` enum('Petugas','Kepala','Administrasi') DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `nama`, `email`, `pass`, `notelp`, `status`, `level`, `foto`) VALUES
('U0001', 'Admin', 'Irvanadmin@gmail.com', 'admin123', '087892878222', 'Aktif', 'Administrasi', 'ch_bgs.jpg'),
('U0002', 'Petugas', 'Petugas@gmail.com', 'Petugas123', '0897639999', 'Aktif', 'Petugas', 'user.png'),
('U0003', 'Kepala', 'Kepala123@gmail.com', 'Kepala123', '123', 'Aktif', 'Kepala', 'user.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak`
--

CREATE TABLE `rak` (
  `id_rak` varchar(20) DEFAULT NULL,
  `rak` varchar(60) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rak`
--

INSERT INTO `rak` (`id_rak`, `rak`, `keterangan`) VALUES
('Rak-01', 'Khusus Pemula', ''),
('Rak-02', 'Khusus Pelajar', ''),
('Rak-03', 'Sastra', ''),
('Rak-04', 'Coding', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku_keliling`
--
ALTER TABLE `buku_keliling`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hibah`
--
ALTER TABLE `hibah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
