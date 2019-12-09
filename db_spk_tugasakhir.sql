-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2019 at 04:15 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk_tugasakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agent_subkriteria`
--

CREATE TABLE `tbl_agent_subkriteria` (
  `id` int(11) NOT NULL,
  `travel_id` varchar(50) NOT NULL,
  `subkriteria_id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agent_travel`
--

CREATE TABLE `tbl_agent_travel` (
  `id` int(11) NOT NULL,
  `travel_id` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `thn_berdiri` year(4) NOT NULL,
  `thn_izin` year(4) NOT NULL,
  `thn_habis` year(4) NOT NULL,
  `nomor_izin` varchar(50) NOT NULL,
  `punya_izin` enum('IYA','TIDAK') NOT NULL,
  `lokasi` varchar(300) NOT NULL,
  `No_HP` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_agent_travel`
--

INSERT INTO `tbl_agent_travel` (`id`, `travel_id`, `nama`, `alamat`, `thn_berdiri`, `thn_izin`, `thn_habis`, `nomor_izin`, `punya_izin`, `lokasi`, `No_HP`, `deskripsi`) VALUES
(1, 'T2', 'Amira Agent', 'h\r\n', 2019, 2012, 2019, '1', 'IYA', 'Palembang', '09', 'Nothing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_fasilitas`
--

CREATE TABLE `tbl_data_fasilitas` (
  `id` int(11) NOT NULL,
  `fasilitas_id` varchar(50) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_paket`
--

CREATE TABLE `tbl_data_paket` (
  `id` int(11) NOT NULL,
  `paket_data_id` varchar(50) NOT NULL,
  `paket_detail` text NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga_paket` varchar(50) NOT NULL,
  `fasilitas_id` varchar(50) NOT NULL,
  `travel_id` varchar(50) NOT NULL,
  `jenispaket_id` varchar(50) NOT NULL,
  `testimoni_id` varchar(50) NOT NULL,
  `sertifikat_id` varchar(50) NOT NULL,
  `nama_hotel` varchar(100) NOT NULL,
  `bintang_hotel` enum('bintang 1','bintang 2','bintang 3','bintang 4','bintang 5') NOT NULL,
  `objek_wisata` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_paket`
--

CREATE TABLE `tbl_jenis_paket` (
  `id` int(11) NOT NULL,
  `jenispaket_id` varchar(50) NOT NULL,
  `jenispaket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_paket`
--

INSERT INTO `tbl_jenis_paket` (`id`, `jenispaket_id`, `jenispaket`) VALUES
(1, 'H1', 'Haji'),
(2, 'U1', 'Umrah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jumlah_fasilitas`
--

CREATE TABLE `tbl_jumlah_fasilitas` (
  `id` int(11) NOT NULL,
  `travel_id` varchar(50) NOT NULL,
  `fasilitas_id` varchar(50) NOT NULL,
  `id_jumlah_fasilitas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id` int(11) NOT NULL,
  `nsms` varchar(255) NOT NULL,
  `bobot` double NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `travel_id` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `travel_id`, `username`, `email`, `password`, `level`) VALUES
(1, 'T1', 'admin', 'admin@gmail.com', 'admin', 'admin'),
(2, 'T2', 'Amira Travel', 'amira@gmail.com', 'amira', 'agent');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profile_user`
--

CREATE TABLE `tbl_profile_user` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` blob NOT NULL,
  `alamat` text NOT NULL,
  `testimoni_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sertifikat`
--

CREATE TABLE `tbl_sertifikat` (
  `id` int(11) NOT NULL,
  `sertifikat_id` int(11) NOT NULL,
  `sertifikat` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subkriteria`
--

CREATE TABLE `tbl_subkriteria` (
  `id` int(11) NOT NULL,
  `kriteria_id` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimoni`
--

CREATE TABLE `tbl_testimoni` (
  `id` int(11) NOT NULL,
  `testimoni_id` varchar(50) NOT NULL,
  `id_pengguna` varchar(50) NOT NULL,
  `nilai` varchar(50) NOT NULL,
  `paket_data_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_agent_subkriteria`
--
ALTER TABLE `tbl_agent_subkriteria`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_data_paket`
--
ALTER TABLE `tbl_data_paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paket_data_id` (`paket_data_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `travel_id` (`travel_id`);

--
-- Indexes for table `tbl_sertifikat`
--
ALTER TABLE `tbl_sertifikat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sertifikat_id` (`sertifikat_id`);

--
-- Indexes for table `tbl_subkriteria`
--
ALTER TABLE `tbl_subkriteria`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `tbl_agent_subkriteria`
--
ALTER TABLE `tbl_agent_subkriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_agent_travel`
--
ALTER TABLE `tbl_agent_travel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_data_fasilitas`
--
ALTER TABLE `tbl_data_fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_paket`
--
ALTER TABLE `tbl_data_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_jenis_paket`
--
ALTER TABLE `tbl_jenis_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_jumlah_fasilitas`
--
ALTER TABLE `tbl_jumlah_fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_sertifikat`
--
ALTER TABLE `tbl_sertifikat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_subkriteria`
--
ALTER TABLE `tbl_subkriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
