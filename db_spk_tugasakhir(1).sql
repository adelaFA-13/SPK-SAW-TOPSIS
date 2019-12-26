-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 01:30 AM
-- Server version: 10.1.19-MariaDB
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
  `deskripsi` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_agent_travel`
--

INSERT INTO `tbl_agent_travel` (`id`, `travel_id`, `nama`, `alamat`, `thn_berdiri`, `thn_izin`, `thn_habis`, `nomor_izin`, `punya_izin`, `lokasi`, `No_HP`, `deskripsi`, `status`) VALUES
(1, 'T2', 'Amira Agent', 'Sekojo', 2019, 2013, 2019, '4', 'IYA', 'Palembang', '08999991543', 'Ini merupakan agent travel', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_fasilitas`
--

CREATE TABLE `tbl_data_fasilitas` (
  `id` int(11) NOT NULL,
  `fasilitas_id` varchar(50) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL,
  `travel_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data_fasilitas`
--

INSERT INTO `tbl_data_fasilitas` (`id`, `fasilitas_id`, `nama_fasilitas`, `travel_id`) VALUES
(20, 'F0001', 'Tawaf', 'T2'),
(21, 'F0002', 'Dokumentasi', 'T2'),
(22, 'F0003', 'makanan', 'T1'),
(23, 'F0003', 'Asuransi', 'T2'),
(24, 'F0004', 'melukis', 'T2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_member`
--

CREATE TABLE `tbl_data_member` (
  `id` int(11) NOT NULL,
  `id_member` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data_member`
--

INSERT INTO `tbl_data_member` (`id`, `id_member`, `nama`, `alamat`) VALUES
(1, 'T4', 'Dina', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_paket`
--

CREATE TABLE `tbl_data_paket` (
  `id` int(11) NOT NULL,
  `paket_data_id` varchar(50) NOT NULL,
  `paket_detail` text NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga_paket` int(50) NOT NULL,
  `id_jumlah_fasilitas` varchar(50) NOT NULL,
  `id_banyak_pelayanan` varchar(50) NOT NULL,
  `travel_id` varchar(50) NOT NULL,
  `jenispaket_id` varchar(50) NOT NULL,
  `testimoni_id` varchar(50) NOT NULL,
  `sertifikat_id` varchar(50) NOT NULL,
  `nama_hotel` varchar(100) NOT NULL,
  `bintang_hotel` enum('bintang 1','bintang 2','bintang 3','bintang 4','bintang 5') NOT NULL,
  `objek_wisata` varchar(100) NOT NULL,
  `nama_maskapai` varchar(50) NOT NULL,
  `rute_penerbangan` varchar(20) NOT NULL,
  `jumlah_hari` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data_paket`
--

INSERT INTO `tbl_data_paket` (`id`, `paket_data_id`, `paket_detail`, `nama_paket`, `harga_paket`, `id_jumlah_fasilitas`, `id_banyak_pelayanan`, `travel_id`, `jenispaket_id`, `testimoni_id`, `sertifikat_id`, `nama_hotel`, `bintang_hotel`, `objek_wisata`, `nama_maskapai`, `rute_penerbangan`, `jumlah_hari`) VALUES
(1, 'P0001', '', 'a', 10000, '', '', 'T2', '', '', '', 'mekkah', 'bintang 4', 'turkey', '2', 'Langsung', '11'),
(3, 'P0002', '', 'b', 10000, '', '', 'T2', 'H1', '', '', 'mekkah', 'bintang 4', 'turkey', '2', 'Langsung', '29'),
(14, 'P0003', '', 'mana', 0, '', '', 'T2', 'U1', '', '', '', '', '', '', '', '10'),
(15, 'P0004', '', 'murah', 0, 'BF0001', '', 'T2', 'H1', '', '', '', '', '', '', '', '1'),
(16, 'P0005', '', 'mahal', 0, 'BF0005', '', 'T2', 'H1', '', '', '', '', '', '', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_pelayanan`
--

CREATE TABLE `tbl_data_pelayanan` (
  `id` int(11) NOT NULL,
  `pelayanan_id` varchar(50) NOT NULL,
  `nama_pelayanan` varchar(100) NOT NULL,
  `travel_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data_pelayanan`
--

INSERT INTO `tbl_data_pelayanan` (`id`, `pelayanan_id`, `nama_pelayanan`, `travel_id`) VALUES
(6, 'PE0001', 'visa', 'T2'),
(7, 'PE0001', 'Passport', 'T2');

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

--
-- Dumping data for table `tbl_jumlah_fasilitas`
--

INSERT INTO `tbl_jumlah_fasilitas` (`id`, `travel_id`, `fasilitas_id`, `id_jumlah_fasilitas`) VALUES
(38, 'T2', 'F0001', 'BF0001'),
(39, 'T2', 'F0003', 'BF0001'),
(40, 'T2', 'F0006', 'BF0001'),
(44, 'T2', 'F0001', 'BF0001'),
(45, 'T2', 'F0002', 'BF0001'),
(46, 'T2', 'F0003', 'BF0005'),
(47, 'T2', 'F0004', 'BF0005');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jumlah_pelayanan`
--

CREATE TABLE `tbl_jumlah_pelayanan` (
  `id` int(11) NOT NULL,
  `travel_id` varchar(50) NOT NULL,
  `pelayanan_id` varchar(50) NOT NULL,
  `id_jumlah_pelayanan` varchar(50) NOT NULL
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
  `user_id` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `user_id`, `username`, `email`, `password`, `level`) VALUES
(1, 'T1', 'admin', 'admin@gmail.com', 'admin', 'admin'),
(2, 'T2', 'Amira Travel', 'amira@gmail.com', 'amira', 'agent'),
(5, 'T3', 'herlan', 'herlan433@gmail.com', 'herlan', 'member'),
(6, 'T4', 'Dina', 'Dinaa12@gmail.com', 'dina', 'member');

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

