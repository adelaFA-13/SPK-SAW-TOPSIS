
CREATE TABLE `tbl_sertifikat` (
  `id` int(11) NOT NULL,
  `travel_id` varchar(11) NOT NULL,
  `sertifikat` longblob NOT NULL,
  `ket` text NOT NULL,
  `tipe_gambar` varchar(50) NOT NULL,
  `ukuran_gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sertifikat`
--

INSERT INTO `tbl_sertifikat` (`id`, `travel_id`, `sertifikat`, `ket`, `tipe_gambar`, `ukuran_gambar`) VALUES
INSERT INTO `tbl_sertifikat` (`id`, `travel_id`, `sertifikat`, `ket`, `tipe_gambar`, `ukuran_gambar`) VALUES

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
-- Table structure for table `tbl_tes`
--

CREATE TABLE `tbl_tes` (
  `lokasi_id` int(11) NOT NULL,
  `lat` varchar(500) NOT NULL,
  `long` varchar(500) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tes`
--

INSERT INTO `tbl_tes` (`lokasi_id`, `lat`, `long`, `keterangan`) VALUES
(87, '-2.9917268121780576', '104.7635535104215', '');

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