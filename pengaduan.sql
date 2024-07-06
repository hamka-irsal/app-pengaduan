-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 01:35 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `deleted`) VALUES
(1, 'Instalasi Kelistrikan', 0),
(2, 'Kendaraan Dinas', 0),
(4, 'Peralatan Lab & Bengkel', 0),
(5, 'perangkat komputer/elektronik', 0),
(6, 'pompa air', 0),
(7, 'air conditioner (ac)', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `deleted`) VALUES
(6, 'toilet', 0),
(7, 'peralatan', 0),
(8, 'fasilitas lab', 0),
(9, 'fasilitas kelas', 0),
(10, 'fasilitas kampus', 0);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(20) NOT NULL,
  `posisi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `posisi`) VALUES
(1, 'anggota', ''),
(2, 'analis', ''),
(3, 'koordinator', 'lab'),
(4, 'koordinator', 'akademik'),
(5, 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('masuk','diproses','selesai') NOT NULL DEFAULT 'masuk',
  `keterangan` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `id_pengaduan`, `id_user`, `status`, `keterangan`, `timestamp`) VALUES
(1, 1, 4, 'masuk', NULL, '2018-07-03 18:41:42'),
(2, 2, 4, 'masuk', NULL, '2018-07-03 18:42:42'),
(3, 2, 3, 'diproses', 'butuh beli peralatan baru', '2018-07-03 18:44:41'),
(4, 3, 3, 'masuk', NULL, '2018-07-03 18:46:19'),
(5, 4, 2, 'masuk', NULL, '2018-07-03 18:47:33'),
(6, 3, 11, 'selesai', NULL, '2018-07-03 18:48:51'),
(7, 5, 2, 'masuk', NULL, '2018-07-03 23:32:13'),
(8, 6, 2, 'masuk', NULL, '2018-07-03 23:35:18'),
(9, 7, 9, 'masuk', NULL, '2018-07-03 23:41:36'),
(10, 8, 9, 'masuk', NULL, '2018-07-03 23:44:33'),
(11, 1, 9, 'diproses', 'butuh dana untuk mengundang tukang servis', '2018-07-03 23:56:18'),
(12, 9, 11, 'masuk', NULL, '2018-07-04 01:54:25'),
(13, 10, 11, 'masuk', NULL, '2018-07-04 01:56:33'),
(14, 9, 6, 'masuk', NULL, '2018-07-04 09:05:24'),
(15, 10, 6, 'masuk', NULL, '2018-07-04 09:06:22'),
(16, 10, 11, 'diproses', 'ga tau', '2018-07-04 09:10:42'),
(17, 4, 11, 'selesai', NULL, '2018-07-04 09:10:51'),
(18, 9, 11, 'selesai', NULL, '2018-07-04 09:11:56'),
(19, 10, 2, 'selesai', NULL, '2018-07-04 09:15:00'),
(20, 11, 3, 'masuk', NULL, '2018-07-04 12:56:43'),
(21, 11, 3, 'selesai', NULL, '2018-07-04 14:38:30'),
(22, 12, 9, 'masuk', NULL, '2024-07-05 15:30:30'),
(23, 13, 9, 'masuk', NULL, '2024-07-05 15:41:47'),
(24, 14, 13, 'masuk', NULL, '2024-07-06 01:48:40'),
(25, 15, 9, 'masuk', NULL, '2024-07-06 01:57:25'),
(26, 15, 3, 'selesai', 'okw', '2024-07-06 02:19:21'),
(27, 7, 3, 'selesai', 'sds', '2024-07-06 02:26:09'),
(28, 13, 11, 'diproses', 'fdfggd', '2024-07-06 14:54:11'),
(29, 13, 2, 'selesai', 'fefree', '2024-07-06 15:07:41'),
(30, 16, 12, 'masuk', NULL, '2024-07-06 15:25:05'),
(31, 14, 11, 'selesai', 'dfafa', '2024-07-06 15:29:17'),
(32, 17, 9, 'masuk', NULL, '2024-07-06 16:36:30'),
(33, 17, 3, 'selesai', 'oke', '2024-07-06 16:41:12'),
(34, 18, 13, 'masuk', NULL, '2024-07-06 16:44:41'),
(35, 18, 11, 'selesai', 'oke sih', '2024-07-06 16:46:18'),
(36, 19, 9, 'masuk', NULL, '2024-07-06 16:48:51'),
(37, 20, 9, 'masuk', NULL, '2024-07-06 16:52:44'),
(38, 20, 11, 'diproses', 'tyrhgtr', '2024-07-06 16:56:07'),
(39, 20, 2, 'selesai', 'sasa', '2024-07-06 17:07:43'),
(40, 19, 11, 'diproses', 'enjoy', '2024-07-06 19:11:16'),
(41, 19, 2, 'selesai', 'sipp', '2024-07-06 19:12:08'),
(42, 21, 9, 'masuk', NULL, '2024-07-06 23:07:09'),
(43, 21, 3, 'diproses', 'ok', '2024-07-06 23:09:37'),
(44, 21, 2, 'selesai', 'gasskan', '2024-07-06 23:10:56'),
(45, 22, 13, 'masuk', NULL, '2024-07-06 23:19:54'),
(46, 22, 11, 'diproses', 'gasskan bosku', '2024-07-06 23:20:43'),
(47, 22, 2, 'selesai', 'gass kan co', '2024-07-06 23:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `wkt_pengaduan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_kejadian` date NOT NULL,
  `penyebab` varchar(255) DEFAULT NULL,
  `efek` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `tindaklanjut` varchar(255) DEFAULT NULL,
  `kejadian` enum('pertama','beberapa kali') DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `gambar` varchar(255) DEFAULT NULL,
  `status` enum('masuk','diproses','selesai') NOT NULL DEFAULT 'masuk',
  `skala_prioritas` enum('Darurat','Mendesak','Jangka Panjang') NOT NULL,
  `nilai_prioritas` float NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_user`, `id_jenis`, `id_ruang`, `id_kategori`, `wkt_pengaduan`, `tgl_kejadian`, `penyebab`, `efek`, `deskripsi`, `tindaklanjut`, `kejadian`, `deleted`, `gambar`, `status`, `skala_prioritas`, `nilai_prioritas`, `timestamp`) VALUES
(1, 4, 1, 3, 1, '2018-07-03 18:41:42', '2018-07-03', 'tidak tersedianya sarana yang memadahi', 'sdasdaa', 'daddas', 'dsdsds', 'beberapa kali', 0, NULL, 'selesai', 'Darurat', 0, '2024-07-05 15:54:01'),
(12, 9, 2, 0, 3, '2024-07-05 15:30:30', '2024-07-05', 'wwsdw', 'qeqdq', 'qewqeq', 'eqeeq', 'pertama', 0, 'Hamka_Irsal_3_1720193430.jpeg', 'masuk', 'Darurat', 0, '2024-07-05 15:30:30'),
(13, 9, 1, 9, 4, '2024-07-05 15:41:47', '2024-07-05', 'fwsfsfs', 'sfdss', 'fdsfsd', 'dsdfdsf', 'beberapa kali', 0, 'Hamka_Irsal_4_1720194107.png', 'selesai', 'Darurat', 0, '2024-07-06 15:07:41'),
(14, 13, 1, 10, 5, '2024-07-06 01:48:40', '2024-07-06', 'fwsfsfs', 'sfdss', 'dasdad', 'afdada', 'pertama', 0, 'kiel_5_1720230520.jpeg', 'selesai', 'Darurat', 0, '2024-07-06 15:29:17'),
(15, 9, 4, 2, 6, '2024-07-06 01:57:25', '2024-07-06', 'fwsfsfs', 'sfdss', 'ghetrg', 'ergwg', 'pertama', 0, 'Hamka_Irsal_6_1720231045.jpeg', 'selesai', 'Darurat', 0, '2024-07-06 02:19:21'),
(16, 12, 1, 1, 3, '2024-07-06 15:25:05', '2024-07-06', 'vdfsf', 'dfsdsd', 'fdfsfd', 'dffsdfdsdfd', 'pertama', 0, 'afri_3_1720279505.jpeg', 'masuk', 'Darurat', 0, '2024-07-06 15:25:05'),
(17, 9, 5, 28, 8, '2024-07-06 16:36:30', '2024-07-06', 'vgsfgs', 'sfgvfsfs', 'fdsdsss', 'belum ada', 'pertama', 0, 'Hamka_Irsal_8_1720283790.png', 'selesai', 'Darurat', 0, '2024-07-06 16:41:12'),
(18, 13, 7, 26, 9, '2024-07-06 16:44:41', '2024-07-06', 'fsdfsfsd', 'dsffsfd', 'sdfsdf', 'fsdfs', 'pertama', 0, 'kiel_9_1720284281.jpeg', 'selesai', 'Darurat', 0, '2024-07-06 16:46:18'),
(19, 9, 1, 30, 7, '2024-07-06 16:48:51', '2024-07-06', 'dwedwwedq', 'wwew', 'qewe', 'weqerewde', 'pertama', 0, 'Hamka_Irsal_7_1720284531.jpeg', 'selesai', 'Darurat', 0, '2024-07-06 19:12:08'),
(20, 9, 6, 31, 7, '2024-07-06 16:52:44', '2024-07-06', 'dfsfsdfs', 'fsfdds', 'sfgsrgsf', 'fdsffdsf', 'pertama', 0, 'Hamka_Irsal_7_1720284764.png', 'selesai', 'Darurat', 0, '2024-07-06 17:07:43'),
(21, 9, 7, 29, 8, '2024-07-06 23:07:09', '2024-07-07', 'qerww', 'ewerwr', 'frewrte', 'rwwwrew', 'pertama', 0, 'Hamka_Irsal_8_1720307229.png', 'selesai', 'Darurat', 0, '2024-07-06 23:10:56'),
(22, 13, 1, 26, 9, '2024-07-06 23:19:54', '2024-07-07', 'adsaa', 'adeada', 'edade', 'aedaed', 'pertama', 0, 'kiel_9_1720307994.jpeg', 'selesai', 'Darurat', 0, '2024-07-06 23:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` tinyint(4) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `role`) VALUES
(1, 'mahasiswa'),
(3, 'pegawai'),
(5, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `nama_ruang` varchar(100) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `id_tempat`, `nama_ruang`, `deleted`) VALUES
(26, 7, 'a 201', 0),
(27, 7, 'b 211', 0),
(28, 1, 'laboratorium koding', 0),
(29, 1, 'laboratorium desain', 0),
(30, 3, 'mushollah', 0),
(31, 4, 'toilet laki-laki', 0),
(32, 4, 'toilet perempuan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE `tempat` (
  `id_tempat` int(11) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`id_tempat`, `nama_tempat`, `deleted`) VALUES
(1, 'laboratorium', 0),
(3, 'tempat ibadah', 0),
(4, 'toilet', 0),
(7, 'kelas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id_token` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `expired` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id_token`, `token`, `id_user`, `created`, `expired`) VALUES
(1, '70394585ea1d08cb6dc4246314cbf60f', 2, '2018-06-02 00:38:00', '2018-06-02 09:38:00'),
(2, '809de893e1dc2dc64845826e62cb2408', 2, '2018-06-02 07:19:00', '2018-06-02 16:19:00'),
(3, '5e37f884d1e368d35eba1645ce45e257', 1, '2018-06-06 04:00:00', '2018-06-06 13:00:00'),
(4, '45560fd1a8c6f1b8e25ca17f569974b4', 1, '2018-06-06 04:07:00', '2018-06-06 13:07:00'),
(5, 'c3fd29a921d40e41541dea6416305921', 2, '2018-06-25 01:09:00', '2018-06-25 10:09:00'),
(6, '0dd32395601bdb050f62495239ef45ea', 3, '2018-06-27 02:02:00', '2018-06-27 11:02:00'),
(7, '7e1eeba7e59811980325a55eddc2421a', 3, '2018-06-27 02:03:00', '2018-06-27 11:03:00'),
(8, 'a5fb44daecc6c0e33cfe7c243138bc4e', 2, '2018-06-27 02:03:00', '2018-06-27 11:03:00'),
(9, '36c0ce06602cba4994dbe9ac6e5f2d9c', 3, '2018-06-27 04:34:00', '2018-06-27 13:34:00'),
(10, '00304811ce4f2c7bcb6abe8cdda98ffe', 3, '2018-06-27 04:40:00', '2018-06-27 13:40:00'),
(11, '16438cab531cfe5832cd1b8533bb0cbd', 3, '2018-06-27 04:49:00', '2018-06-27 13:49:00'),
(12, '5fcc1f240fd5ae4e7008023e29c52517', 3, '2018-06-28 02:43:00', '2018-06-28 11:43:00'),
(13, 'dae7b2b81e09d8e35ee2d8eee3d589a5', 3, '2018-06-28 09:51:00', '2018-06-28 18:51:00'),
(14, 'c990437f22b6420a970e48ebc0265eae', 3, '2018-06-28 09:56:00', '2018-06-28 18:56:00'),
(15, 'c6970526300fcf754cf8f771b5d276e1', 9, '2024-07-06 05:45:00', '2024-07-06 15:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` tinyint(4) NOT NULL,
  `id_level` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_pengguna`, `email`, `password`, `id_role`, `id_level`, `status`, `deleted`, `timestamp`, `username`) VALUES
(1, 'admin', 'sinfo.pengaduan@gmail.com', '0192023a7bbd73250516f069df18b500', 3, 5, 1, 0, '2024-07-04 22:43:05', 'admin'),
(2, 'pegawai', 'pegawai@gmail.com', '6f7cf810b9252805f195bcf981156af6', 3, 2, 1, 0, '2024-07-06 19:04:11', 'pegawai'),
(3, 'pengelola lab', 'lab@gmail.com', '081c49b8c66a69aad79f4bca8334e0ef', 3, 3, 1, 0, '2024-07-06 19:07:46', 'lab'),
(9, 'Hamka Irsal', 'hamka@gmail.com', '33546feaae448b3226548e88e3049cdb', 1, 1, 1, 0, '2024-07-04 22:27:40', '192300'),
(11, 'pengelola akademik', 'akademik@gmail.com', '1d975547d8ae5c05522b24b9f4af094e', 3, 4, 1, 0, '2024-07-06 19:08:05', 'akademik'),
(13, 'kiel', 'kiel@gmail.com', '$2y$10$jMl4cYA3FyIYVxTgYj3E1.HzDOPlVTH3ua17EDd3ei0yPL7udS/vW', 1, 1, 1, 0, '2024-07-06 01:46:40', '192302');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id_token`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tempat`
--
ALTER TABLE `tempat`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
