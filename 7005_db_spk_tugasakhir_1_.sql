-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Des 2019 pada 01.41
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk_tugasakhir(1)`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_agent_travel`
--

CREATE TABLE `tbl_agent_travel` (
  `id` int(11) NOT NULL,
  `travel_id` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `thn_berdiri` year(4) NOT NULL,
  `thn_izin` year(4) NOT NULL,
  `thn_habis` date NOT NULL,
  `nomor_izin` varchar(50) NOT NULL,
  `punya_izin` enum('IYA','TIDAK') NOT NULL,
  `lokasi` varchar(300) NOT NULL,
  `No_HP` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_agent_travel`
--

INSERT INTO `tbl_agent_travel` (`id`, `travel_id`, `nama`, `alamat`, `thn_berdiri`, `thn_izin`, `thn_habis`, `nomor_izin`, `punya_izin`, `lokasi`, `No_HP`, `deskripsi`, `status`, `foto`) VALUES
(1, 'T2', 'Amira Agent', 'Perum', 2019, 2013, '2018-10-08', '4', 'IYA', 'Palembang', '08999991543', 'Ini merupakan agent travel', 'Aktif', 'foto/avatar-1.png'),
(2, 'T4', 'Dina Travel', 'jl. wijaya no 8', 0000, 0000, '2019-12-24', '', '', '', '', '', '', ''),
(3, 'T5', 'ZIU', 'bukit besar', 2007, 0000, '2020-01-02', '', 'TIDAK', '', '', '', '', 'foto/avatar-2.png'),
(4, 'T6', 'Dina', '', 0000, 0000, '2019-12-25', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_fasilitas`
--

CREATE TABLE `tbl_data_fasilitas` (
  `id` int(11) NOT NULL,
  `fasilitas_id` varchar(50) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL,
  `travel_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_data_fasilitas`
--

INSERT INTO `tbl_data_fasilitas` (`id`, `fasilitas_id`, `nama_fasilitas`, `travel_id`) VALUES
(20, 'F0001', 'Tawaf', 'T2'),
(21, 'F0002', 'Dokumentasi', 'T2'),
(22, 'F0004', 'makanan', 'T1'),
(23, 'F0005', 'Asuransi', 'T2'),
(24, 'F0006', 'melukis', 'T2'),
(25, 'F0007', 'Dokumentas', 'T4'),
(29, 'F0008', 'minum', 'T4'),
(30, 'F0009', 'haus', 'T4'),
(31, 'F0010', 'makan', 'T2'),
(32, 'F0011', 'koper', 'T5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_member`
--

CREATE TABLE `tbl_data_member` (
  `id` int(11) NOT NULL,
  `id_member` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_data_member`
--

INSERT INTO `tbl_data_member` (`id`, `id_member`, `nama`, `alamat`) VALUES
(1, 'T6', 'Dina', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_paket`
--

CREATE TABLE `tbl_data_paket` (
  `id` int(11) NOT NULL,
  `paket_data_id` varchar(50) NOT NULL,
  `paket_detail` text NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga_paket` int(50) NOT NULL,
  `id_jumlah_fasilitas` varchar(50) NOT NULL,
  `id_jumlah_pelayanan` varchar(50) NOT NULL,
  `travel_id` varchar(50) NOT NULL,
  `jenispaket_id` varchar(50) NOT NULL,
  `testimoni_id` varchar(50) NOT NULL,
  `sertifikat_id` varchar(50) NOT NULL,
  `nama_hotel` varchar(100) NOT NULL,
  `bintang_hotel` enum('bintang 1','bintang 2','bintang 3','bintang 4','bintang 5') NOT NULL,
  `objek_wisata` varchar(100) NOT NULL,
  `nama_maskapai` varchar(50) NOT NULL,
  `rute_penerbangan` enum('Langsung','Tidak Langsung','','') NOT NULL,
  `jumlah_hari` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_data_paket`
--

INSERT INTO `tbl_data_paket` (`id`, `paket_data_id`, `paket_detail`, `nama_paket`, `harga_paket`, `id_jumlah_fasilitas`, `id_jumlah_pelayanan`, `travel_id`, `jenispaket_id`, `testimoni_id`, `sertifikat_id`, `nama_hotel`, `bintang_hotel`, `objek_wisata`, `nama_maskapai`, `rute_penerbangan`, `jumlah_hari`) VALUES
(23, 'P0001', '', 'dina paket 1', 52000000, 'BF0001', 'BS0001', 'T4', 'H1', '', '', '', 'bintang 5', 'maroko', '', 'Langsung', '30'),
(24, 'P0002', '', 'dina paket 2', 21550000, 'BF0002', 'BS0002', 'T4', 'U1', '', '', '', 'bintang 4', 'turkey', '', 'Tidak Langsung', '10'),
(25, 'P0003', '', 'paket amira 1', 230000000, 'BF0003', 'BS0003', 'T2', 'U1', '', '', '', 'bintang 2', '', '', 'Langsung', '11'),
(26, 'P0004', '', 'paket amira 2', 200000000, 'BF0004', 'BS0004', 'T2', 'U1', '', '', '', 'bintang 1', '', '', 'Tidak Langsung', '9'),
(38, 'P0005', '', 'ziu paket', 300000000, 'BF0005', 'BS0005', 'T5', 'H1', '', '', '', 'bintang 3', 'Tidak Ada', '', 'Tidak Langsung', '29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_pelayanan`
--

CREATE TABLE `tbl_data_pelayanan` (
  `id` int(11) NOT NULL,
  `pelayanan_id` varchar(50) NOT NULL,
  `nama_pelayanan` varchar(100) NOT NULL,
  `travel_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_data_pelayanan`
--

INSERT INTO `tbl_data_pelayanan` (`id`, `pelayanan_id`, `nama_pelayanan`, `travel_id`) VALUES
(22, 'S0003', 'Passport', 'T2'),
(23, 'S0004', 'Visa', 'T2'),
(24, 'S0005', 'Passport', 'T5'),
(25, 'S0006', 'Visa', 'T5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis_paket`
--

CREATE TABLE `tbl_jenis_paket` (
  `id` int(11) NOT NULL,
  `jenispaket_id` varchar(50) NOT NULL,
  `jenispaket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jenis_paket`
--

INSERT INTO `tbl_jenis_paket` (`id`, `jenispaket_id`, `jenispaket`) VALUES
(1, 'H1', 'Haji'),
(2, 'U1', 'Umrah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jumlah_fasilitas`
--

CREATE TABLE `tbl_jumlah_fasilitas` (
  `id` int(11) NOT NULL,
  `travel_id` varchar(50) NOT NULL,
  `fasilitas_id` varchar(50) NOT NULL,
  `id_jumlah_fasilitas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jumlah_fasilitas`
--

INSERT INTO `tbl_jumlah_fasilitas` (`id`, `travel_id`, `fasilitas_id`, `id_jumlah_fasilitas`) VALUES
(54, 'T4', 'F0007', 'BF0001'),
(55, 'T4', 'F0008', 'BF0001'),
(58, 'T4', 'F0008', 'BF0002'),
(59, 'T2', 'F0006', 'BF0003'),
(61, 'T2', 'F0001', 'BF0003'),
(62, 'T2', 'F0002', 'BF0004'),
(63, 'T2', 'F0001', 'BF0004'),
(64, 'T2', 'F0005', 'BF0004'),
(65, 'T4', 'F0009', 'BF0001'),
(66, 'T5', 'F0011', 'BF0005'),
(67, 'T5', 'F0011', 'BF0006'),
(73, 'T5', 'F0011', 'BF0005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jumlah_pelayanan`
--

CREATE TABLE `tbl_jumlah_pelayanan` (
  `id` int(11) NOT NULL,
  `travel_id` varchar(50) NOT NULL,
  `pelayanan_id` varchar(50) NOT NULL,
  `id_jumlah_pelayanan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jumlah_pelayanan`
--

INSERT INTO `tbl_jumlah_pelayanan` (`id`, `travel_id`, `pelayanan_id`, `id_jumlah_pelayanan`) VALUES
(73, 'T5', 'S0005', 'BS0005'),
(74, 'T5', 'S0006', 'BS0005'),
(75, 'T4', '', 'BS0001'),
(76, 'T4', '', 'BS0002'),
(77, 'T2', '', 'BS0003'),
(78, 'T2', '', 'BS0004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `user_id`, `username`, `email`, `password`, `level`) VALUES
(1, 'T1', 'admin', 'admin@gmail.com', 'admin', 'admin'),
(2, 'T2', 'Amira Travel', 'amira@gmail.com', 'amira', 'agent'),
(6, 'T4', 'Dina', 'Dinaa12@gmail.com', 'dina', 'agent'),
(7, 'T5', 'ZIU', 'ZIU@gmail.com', '123456', 'agent'),
(8, 'T6', 'Dina', 'Dinaa12@gmail.com', '1234', 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lokasi`
--

CREATE TABLE `tbl_lokasi` (
  `lokasi_id` int(11) NOT NULL,
  `travel_id` varchar(50) NOT NULL,
  `lat` varchar(500) NOT NULL,
  `long` varchar(500) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`lokasi_id`, `travel_id`, `lat`, `long`, `keterangan`) VALUES
(6, 'T2', '-2.9336257209035232', '104.74835725306957', 'Herlan GANTENG BANGET'),
(7, 'T4', '-2.9734576268326207', '104.7447120471993', 'jl. wijaya no 8'),
(14, 'T5', '-2.843689511305495', '104.67694612025707', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sertifikat`
--

CREATE TABLE `tbl_sertifikat` (
  `id` int(11) NOT NULL,
  `travel_id` varchar(11) NOT NULL,
  `sertifikat` longblob NOT NULL,
  `ket` text NOT NULL,
  `tipe_gambar` varchar(50) NOT NULL,
  `ukuran_gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sertifikat`
--

INSERT INTO `tbl_sertifikat` (`id`, `travel_id`, `sertifikat`, `ket`, `tipe_gambar`, `ukuran_gambar`) VALUES
INSERT INTO `tbl_sertifikat` (`id`, `travel_id`, `sertifikat`, `ket`, `tipe_gambar`, `ukuran_gambar`) VALUES

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_testimoni`
--

CREATE TABLE `tbl_testimoni` (
  `id` int(11) NOT NULL,
  `testimoni_id` varchar(50) NOT NULL,
  `id_member` varchar(50) NOT NULL,
  `nilai` varchar(50) NOT NULL,
  `travel_id` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_testimoni`
--

INSERT INTO `tbl_testimoni` (`id`, `testimoni_id`, `id_member`, `nilai`, `travel_id`, `tanggal`) VALUES
(1, 'M01', 'T6', '2', 'T2', '2019-12-24 03:58:21'),
(2, 'M02', 'T6', '3', 'T2', '2019-12-24 03:58:21'),
(3, 'M03', 'T6', '4', 'T4', '2019-12-24 03:58:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_agent_travel`
--
ALTER TABLE `tbl_agent_travel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `travel_id` (`travel_id`);

--
-- Indexes for table `tbl_data_fasilitas`
--
ALTER TABLE `tbl_data_fasilitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fasilitas_id` (`fasilitas_id`);

--
-- Indexes for table `tbl_data_member`
--
ALTER TABLE `tbl_data_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `tbl_data_paket`
--
ALTER TABLE `tbl_data_paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paket_data_id` (`paket_data_id`);

--
-- Indexes for table `tbl_data_pelayanan`
--
ALTER TABLE `tbl_data_pelayanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jenis_paket`
--
ALTER TABLE `tbl_jenis_paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenispaket_id` (`jenispaket_id`);

--
-- Indexes for table `tbl_jumlah_fasilitas`
--
ALTER TABLE `tbl_jumlah_fasilitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jumlah_fasilitas` (`id_jumlah_fasilitas`);

--
-- Indexes for table `tbl_jumlah_pelayanan`
--
ALTER TABLE `tbl_jumlah_pelayanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jumlah_pelayanan` (`id_jumlah_pelayanan`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `travel_id` (`user_id`);

--
-- Indexes for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`lokasi_id`),
  ADD KEY `travel_id` (`travel_id`);

--
-- Indexes for table `tbl_sertifikat`
--
ALTER TABLE `tbl_sertifikat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sertifikat_id` (`travel_id`);

--
-- Indexes for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimoni_id` (`testimoni_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_agent_travel`
--
ALTER TABLE `tbl_agent_travel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_data_fasilitas`
--
ALTER TABLE `tbl_data_fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tbl_data_member`
--
ALTER TABLE `tbl_data_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_data_paket`
--
ALTER TABLE `tbl_data_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tbl_data_pelayanan`
--
ALTER TABLE `tbl_data_pelayanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_jenis_paket`
--
ALTER TABLE `tbl_jenis_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_jumlah_fasilitas`
--
ALTER TABLE `tbl_jumlah_fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `tbl_jumlah_pelayanan`
--
ALTER TABLE `tbl_jumlah_pelayanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  MODIFY `lokasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_sertifikat`
--
ALTER TABLE `tbl_sertifikat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;