-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2024 at 06:44 PM
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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `id_pengaduan`, `pesan`, `created_at`) VALUES
(1, 54, 'done gays', '2024-08-09 01:55:08'),
(2, 54, 'gass kan', '2024-08-09 01:55:34'),
(3, 55, 'gaas', '2024-08-09 01:57:08'),
(4, 55, 'dasa', '2024-08-09 01:57:58'),
(5, 18, 'okesih', '2024-09-23 21:39:57');

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
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `foto`) VALUES
(6, 'AC', 'ac.jpg'),
(7, 'Laptop', 'lp.jpeg'),
(8, 'Personal Computer', 'pc.jpeg');

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
(2, 'pegawai', ''),
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
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `id_pengaduan`, `id_user`, `status`, `keterangan`, `timestamp`, `deleted`) VALUES
(1, 17, 0, 'masuk', NULL, '2024-09-23 12:50:35', 0),
(3, 18, 0, 'masuk', NULL, '2024-09-23 13:03:01', 0),
(4, 17, 81, 'selesai', 'yakin bisa tampil', '2024-09-23 13:03:49', 0),
(5, 18, 82, 'selesai', 'gass', '2024-09-23 15:09:51', 0),
(6, 19, 0, 'masuk', NULL, '2024-09-23 15:18:17', 0),
(7, 20, 0, 'masuk', NULL, '2024-09-23 15:21:09', 0),
(8, 21, 0, 'masuk', NULL, '2024-09-23 15:22:35', 0),
(9, 22, 0, 'masuk', NULL, '2024-09-23 15:24:59', 0),
(10, 23, 0, 'masuk', NULL, '2024-09-23 16:10:19', 0),
(11, 24, 0, 'masuk', NULL, '2024-09-23 16:14:56', 0),
(12, 25, 0, 'masuk', NULL, '2024-09-23 16:17:05', 0),
(13, 26, 0, 'masuk', NULL, '2024-09-23 16:18:36', 0),
(14, 27, 0, 'masuk', NULL, '2024-09-23 16:20:25', 0),
(15, 28, 0, 'masuk', NULL, '2024-09-23 16:22:32', 0),
(16, 28, 92, 'selesai', 'pengaduan anda sudah selesai dikerjakan ', '2024-09-23 16:31:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_messages` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `pengirim` enum('user','admin') NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_messages`, `id_pengaduan`, `pesan`, `pengirim`, `created_at`) VALUES
(1, 54, 'asda', 'user', '2024-08-09 05:09:44'),
(2, 49, 'sasas', 'user', '2024-08-09 05:11:33'),
(3, 54, 'sada', 'user', '2024-08-09 05:12:43'),
(4, 54, 'gass kan mi', 'user', '2024-08-09 05:23:01'),
(5, 49, 'ganta gayss', 'user', '2024-08-10 01:46:05'),
(6, 49, 'yapp', 'user', '2024-08-10 01:50:37'),
(7, 49, 'yoi', 'user', '2024-08-10 01:51:56'),
(8, 49, 'adad', 'user', '2024-08-10 01:52:30'),
(9, 17, 'gaskan mi', 'user', '2024-09-23 21:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `status` enum('unread','read') NOT NULL DEFAULT 'unread',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_user`, `id_pengaduan`, `pesan`, `status`, `tanggal`) VALUES
(1, 1, 10, 'Pengaduan Anda telah selesai diproses oleh admin!.', 'unread', '2024-09-22 08:15:03'),
(2, 0, 4, 'Pengaduan Anda telah selesai diproses oleh admin!.', 'unread', '2024-09-22 08:40:40');

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
  `wkt_pengerjaan` date NOT NULL,
  `tgl_kejadian` date NOT NULL,
  `penyebab` varchar(255) DEFAULT NULL,
  `efek` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `tindaklanjut` varchar(255) DEFAULT NULL,
  `kejadian` enum('pertama','beberapa kali') DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `gambar` varchar(255) DEFAULT NULL,
  `status` enum('masuk','diproses','selesai') NOT NULL DEFAULT 'masuk',
  `unread` tinyint(4) NOT NULL,
  `skala_prioritas` enum('Darurat','Mendesak','Jangka Panjang') NOT NULL,
  `nilai_prioritas` float NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alat` varchar(100) NOT NULL,
  `spesifikasi` varchar(100) NOT NULL,
  `inventaris` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `studi` varchar(100) NOT NULL,
  `uraian` varchar(100) NOT NULL,
  `penyedia` varchar(100) NOT NULL,
  `bahan` varchar(100) NOT NULL,
  `biaya` double NOT NULL DEFAULT '0.3',
  `sdm` double NOT NULL DEFAULT '0.2',
  `regulasi` double NOT NULL DEFAULT '0.1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_user`, `id_jenis`, `id_ruang`, `id_kategori`, `wkt_pengaduan`, `wkt_pengerjaan`, `tgl_kejadian`, `penyebab`, `efek`, `deskripsi`, `tindaklanjut`, `kejadian`, `deleted`, `gambar`, `status`, `unread`, `skala_prioritas`, `nilai_prioritas`, `email`, `nama`, `nip`, `jabatan`, `alat`, `spesifikasi`, `inventaris`, `lokasi`, `jurusan`, `studi`, `uraian`, `penyedia`, `bahan`, `biaya`, `sdm`, `regulasi`, `timestamp`) VALUES
(19, 83, 0, 0, 0, '2024-09-23 15:18:17', '0000-00-00', '2024-09-23', NULL, '', '', 'ingin diganti', NULL, 0, '1727104696.jpeg', 'masuk', 0, 'Darurat', 0, 'hamkairsal23@gmail.com', '', '19342058', 'mahasiswa', 'Laptop', 'Lenovo Thinkpad', '11', '', 'Teknik Informatika dan Komputer', 'Ilmu Komputer', '', '', '', 0.9, 0.9, 0.9, '2024-09-23 16:26:40'),
(20, 84, 0, 0, 0, '2024-09-23 15:21:09', '0000-00-00', '2024-09-23', NULL, '', '', 'mau di install ulang', NULL, 0, '1727104869.jpeg', 'masuk', 0, 'Darurat', 0, 'muhbintang650@gmail.com', '', '232415', 'mahasiswa', 'Laptop', 'Lenovo Legion', '12', '', 'Teknik Informatika dan Komputer', 'Ilmu Komputer', '', '', '', 0.8, 0.9, 0.9, '2024-09-23 16:26:23'),
(21, 85, 0, 0, 0, '2024-09-23 15:22:34', '0000-00-00', '2024-09-23', NULL, '', '', 'mau di ganti', NULL, 0, '1727104954.jpeg', 'masuk', 0, 'Darurat', 0, 'feryfadulrahman@gmail.com', '', '23456782', 'mahasiswa', 'Personal Computer', 'RTX-456', '13', '', 'Teknik Informatika dan Komputer', 'Ilmu Komputer', '', '', '', 0.9, 0.8, 0.7, '2024-09-23 16:26:57'),
(22, 86, 0, 0, 0, '2024-09-23 15:24:59', '0000-00-00', '2024-09-23', NULL, '', '', 'mau di ganti', NULL, 0, '1727105098.jpeg', 'masuk', 0, 'Darurat', 0, 'akmalryadilfitrah25@gmail.com', '', '21253456', 'mahasiswa', 'Personal Computer', 'Lenovo AB-321', '14', '', 'Teknik Informatika dan Komputer', 'Ilmu Komputer', '', '', '', 0.8, 0.9, 0.7, '2024-09-23 16:27:17'),
(23, 87, 0, 0, 0, '2024-09-23 16:10:19', '0000-00-00', '2024-09-23', NULL, '', '', 'mau di perbaiki', NULL, 0, '1727107819.jpeg', 'masuk', 0, 'Darurat', 0, 'arjumnurramadhan21@gmail.com', '', '19342058', 'mahasiswa', 'Personal Computer', 'Lenovo AB-321', '15', '', 'Teknik Informatika dan Komputer', 'Ilmu Komputer', '', '', '', 0.7, 0.7, 0.8, '2024-09-23 16:27:41'),
(24, 88, 0, 0, 0, '2024-09-23 16:14:56', '0000-00-00', '2024-09-23', NULL, '', '', 'mau di perbaiki', NULL, 0, '1727108095.jpeg', 'masuk', 0, 'Darurat', 0, 'basosamriadi34@gmail.com', '', '19342059', 'mahasiswa', 'Personal Computer', 'Lenovo AB-321', '16', '', 'Teknik Informatika dan Komputer', 'Ilmu Komputer', '', '', '', 0.7, 0.6, 0.6, '2024-09-23 16:28:02'),
(25, 89, 0, 0, 0, '2024-09-23 16:17:05', '0000-00-00', '2024-09-23', NULL, '', '', 'mau diganti total', NULL, 0, '1727108225.jpeg', 'masuk', 0, 'Darurat', 0, 'fiqrihaikharanwar14@gmail.com', '', '19342060', 'mahasiswa', 'Personal Computer', 'Asus Tuf Gaming RTX-271', '17', '', 'Teknik Informatika dan Komputer', 'Ilmu Komputer', '', '', '', 0.6, 0.7, 0.5, '2024-09-23 16:28:42'),
(26, 90, 0, 0, 0, '2024-09-23 16:18:36', '0000-00-00', '2024-09-23', NULL, '', '', 'kurang dingin', NULL, 0, '1727108315.jpeg', 'masuk', 0, 'Darurat', 0, 'anonglasanisa18@gmail.com', '', '19234056', 'mahasiswa', 'AC', 'DCA-432', '17', '', 'Teknik Informatika dan Komputer', 'Ilmu Komputer', '', '', '', 0.5, 0.5, 0.6, '2024-09-23 16:29:25'),
(27, 91, 0, 0, 0, '2024-09-23 16:20:25', '0000-00-00', '2024-09-23', NULL, '', '', 'mau di ganti karna kurang dingin', NULL, 0, '1727108424.jpg', 'masuk', 0, 'Darurat', 0, 'afriyusrifal@gmail.com', '', '19236478', 'mahasiswa', 'AC', 'DCA-433', '18', '', 'Teknik Informatika dan Komputer', 'Ilmu Komputer', '', '', '', 0.6, 0.4, 0.4, '2024-09-23 16:29:55'),
(28, 92, 0, 0, 0, '2024-09-23 16:22:32', '2024-09-26', '2024-09-23', NULL, '', '', 'lcd nya rusak', NULL, 0, '1727108552.jpeg', 'selesai', 0, 'Darurat', 0, 'aliffadullah24@gmail.com', '', '19237849', 'mahasiswa', 'Laptop', 'MSI', '19', '', 'Teknik Informatika dan Komputer', 'Ilmu Komputer', 'bahan premium', 'kampus', 'ori', 0.6, 0.3, 0.3, '2024-09-23 16:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tgl_penilaian` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `pendapat1` text NOT NULL,
  `pendapat2` text NOT NULL,
  `pendapat3` text NOT NULL,
  `pendapat4` text NOT NULL,
  `pendapat5` text NOT NULL,
  `saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `email`, `tgl_penilaian`, `nama`, `nip`, `jabatan`, `pendapat1`, `pendapat2`, `pendapat3`, `pendapat4`, `pendapat5`, `saran`) VALUES
(1, 'muhbintang650@gmail.com', '2024-09-21', 'bintang', '23456789', 'mahasiswa', 'Memuaskan', 'Sangat Memuaskan', 'Sangat Memuaskan', 'Memuaskan', 'Sangat Memuaskan', 'saran saya agar selalu mengerjakan ketika ada kerusan yang diajukan oleh pengadu'),
(2, 'hamkairsal23@gmail.com', '2024-09-21', 'hamka', '19230029', 'mahasiswa', 'Memuaskan', 'Sangat Memuaskan', 'Sangat Memuaskan', 'Memuaskan', 'Sangat Memuaskan', 'tolong untuk pelayanannya di perbaiki lagi supaya pengadu nyaman melakukan pengaduan'),
(3, 'hamkairsal23@gmail.com', '2024-09-23', 'hamka', '19230029', 'mahasiswa', 'Kurang Memuaskan', 'Memuaskan', 'Tidak Memuaskan', 'Memuaskan', 'Sangat Memuaskan', 'saran untuk pelayanannya agar bisa dikerjakan secepat mungkin klw ada pelaporan');

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id_ranking` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `preference` decimal(10,4) NOT NULL,
  `peringkat` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `biaya` decimal(10,4) NOT NULL,
  `sdm` decimal(10,4) NOT NULL,
  `regulasi` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`id_ranking`, `id_alternatif`, `id_pengaduan`, `preference`, `peringkat`, `email`, `biaya`, `sdm`, `regulasi`) VALUES
(2, 0, 2, '0.0000', 0, 'hamkairsal23@gmail.com', '0.4000', '0.3000', '0.2000'),
(3, 0, 2, '0.0000', 0, 'hamkairsal23@gmail.com', '0.1265', '0.0949', '0.0632'),
(4, 0, 3, '0.0000', 0, 'muhbintang650@gmail.com', '0.1265', '0.0949', '0.0632'),
(5, 0, 4, '0.0000', 0, 'feryfadulrahman@gmail.com', '0.1265', '0.0949', '0.0632'),
(6, 0, 5, '0.0000', 0, 'akmalryadilfitrah25@gmail.com', '0.1265', '0.0949', '0.0632'),
(7, 0, 6, '0.0000', 0, 'arjumnurramadhan21@gmail.com', '0.1265', '0.0949', '0.0632'),
(8, 0, 7, '0.0000', 0, 'basosamriadi34@gmail.com', '0.1265', '0.0949', '0.0632'),
(9, 0, 8, '0.0000', 0, 'fiqrihaikharanwar14@gmail.com', '0.1265', '0.0949', '0.0632'),
(10, 0, 9, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.1265', '0.0949', '0.0632'),
(11, 0, 10, '0.0000', 0, 'afriyusrifal@gmail.com', '0.1265', '0.0949', '0.0632'),
(12, 0, 11, '0.0000', 0, 'aliffadullah24@gmail.com', '0.1265', '0.0949', '0.0632'),
(13, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.2219', '0.2121', '0.1519'),
(14, 0, 3, '0.0000', 0, 'muhbintang650@gmail.com', '0.1109', '0.0707', '0.0434'),
(15, 0, 4, '0.0000', 0, 'feryfadulrahman@gmail.com', '0.1109', '0.0707', '0.0434'),
(16, 0, 5, '0.0000', 0, 'akmalryadilfitrah25@gmail.com', '0.1109', '0.0707', '0.0434'),
(17, 0, 6, '0.0000', 0, 'arjumnurramadhan21@gmail.com', '0.1109', '0.0707', '0.0434'),
(18, 0, 7, '0.0000', 0, 'basosamriadi34@gmail.com', '0.1109', '0.0707', '0.0434'),
(19, 0, 8, '0.0000', 0, 'fiqrihaikharanwar14@gmail.com', '0.1109', '0.0707', '0.0434'),
(20, 0, 9, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.1109', '0.0707', '0.0434'),
(21, 0, 10, '0.0000', 0, 'afriyusrifal@gmail.com', '0.1109', '0.0707', '0.0434'),
(22, 0, 11, '0.0000', 0, 'aliffadullah24@gmail.com', '0.1109', '0.0707', '0.0434'),
(23, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.2061', '0.1833', '0.1294'),
(24, 0, 3, '0.7967', 0, 'muhbintang650@gmail.com', '0.1804', '0.1629', '0.1109'),
(25, 0, 4, '0.0000', 0, 'feryfadulrahman@gmail.com', '0.1031', '0.0611', '0.0370'),
(26, 0, 5, '0.0000', 0, 'akmalryadilfitrah25@gmail.com', '0.1031', '0.0611', '0.0370'),
(27, 0, 6, '0.0000', 0, 'arjumnurramadhan21@gmail.com', '0.1031', '0.0611', '0.0370'),
(28, 0, 7, '0.0000', 0, 'basosamriadi34@gmail.com', '0.1031', '0.0611', '0.0370'),
(29, 0, 8, '0.0000', 0, 'fiqrihaikharanwar14@gmail.com', '0.1031', '0.0611', '0.0370'),
(30, 0, 9, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.1031', '0.0611', '0.0370'),
(31, 0, 10, '0.0000', 0, 'afriyusrifal@gmail.com', '0.1031', '0.0611', '0.0370'),
(32, 0, 11, '0.0000', 0, 'aliffadullah24@gmail.com', '0.1031', '0.0611', '0.0370'),
(33, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1981', '0.1769', '0.1100'),
(34, 0, 3, '0.7966', 0, 'muhbintang650@gmail.com', '0.1733', '0.1572', '0.0943'),
(35, 0, 4, '0.5205', 0, 'feryfadulrahman@gmail.com', '0.1486', '0.0983', '0.1100'),
(36, 0, 5, '0.0000', 0, 'akmalryadilfitrah25@gmail.com', '0.0990', '0.0590', '0.0314'),
(37, 0, 6, '0.0000', 0, 'arjumnurramadhan21@gmail.com', '0.0990', '0.0590', '0.0314'),
(38, 0, 7, '0.0000', 0, 'basosamriadi34@gmail.com', '0.0990', '0.0590', '0.0314'),
(39, 0, 8, '0.0000', 0, 'fiqrihaikharanwar14@gmail.com', '0.0990', '0.0590', '0.0314'),
(40, 0, 9, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.0990', '0.0590', '0.0314'),
(41, 0, 10, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0990', '0.0590', '0.0314'),
(42, 0, 11, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0990', '0.0590', '0.0314'),
(43, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1909', '0.1711', '0.1061'),
(44, 0, 3, '0.7968', 0, 'muhbintang650@gmail.com', '0.1670', '0.1521', '0.0910'),
(45, 0, 4, '0.5201', 0, 'feryfadulrahman@gmail.com', '0.1432', '0.0951', '0.1061'),
(46, 0, 5, '0.4037', 0, 'akmalryadilfitrah25@gmail.com', '0.1432', '0.0951', '0.0606'),
(47, 0, 6, '0.0000', 0, 'arjumnurramadhan21@gmail.com', '0.0954', '0.0570', '0.0303'),
(48, 0, 7, '0.0000', 0, 'basosamriadi34@gmail.com', '0.0954', '0.0570', '0.0303'),
(49, 0, 8, '0.0000', 0, 'fiqrihaikharanwar14@gmail.com', '0.0954', '0.0570', '0.0303'),
(50, 0, 9, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.0954', '0.0570', '0.0303'),
(51, 0, 10, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0954', '0.0570', '0.0303'),
(52, 0, 11, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0954', '0.0570', '0.0303'),
(53, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1844', '0.1659', '0.1046'),
(54, 0, 3, '0.7969', 0, 'muhbintang650@gmail.com', '0.1614', '0.1474', '0.0897'),
(55, 0, 4, '0.5228', 0, 'feryfadulrahman@gmail.com', '0.1383', '0.0921', '0.1046'),
(56, 0, 5, '0.4035', 0, 'akmalryadilfitrah25@gmail.com', '0.1383', '0.0921', '0.0598'),
(57, 0, 6, '0.3659', 0, 'arjumnurramadhan21@gmail.com', '0.1383', '0.0921', '0.0448'),
(58, 0, 7, '0.0000', 0, 'basosamriadi34@gmail.com', '0.0922', '0.0553', '0.0299'),
(59, 0, 8, '0.0000', 0, 'fiqrihaikharanwar14@gmail.com', '0.0922', '0.0553', '0.0299'),
(60, 0, 9, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.0922', '0.0553', '0.0299'),
(61, 0, 10, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0922', '0.0553', '0.0299'),
(62, 0, 11, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0922', '0.0553', '0.0299'),
(63, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1844', '0.1674', '0.1032'),
(64, 0, 3, '0.8131', 0, 'muhbintang650@gmail.com', '0.1614', '0.1488', '0.0885'),
(65, 0, 4, '0.5413', 0, 'feryfadulrahman@gmail.com', '0.1383', '0.0930', '0.1032'),
(66, 0, 5, '0.4435', 0, 'akmalryadilfitrah25@gmail.com', '0.1383', '0.0930', '0.0590'),
(67, 0, 6, '0.4117', 0, 'arjumnurramadhan21@gmail.com', '0.1383', '0.0930', '0.0442'),
(68, 0, 7, '0.0798', 0, 'basosamriadi34@gmail.com', '0.0922', '0.0372', '0.0442'),
(69, 0, 8, '0.1027', 0, 'fiqrihaikharanwar14@gmail.com', '0.0922', '0.0558', '0.0295'),
(70, 0, 9, '0.1027', 0, 'anonglasanisa18@gmail.com', '0.0922', '0.0558', '0.0295'),
(71, 0, 10, '0.1027', 0, 'afriyusrifal@gmail.com', '0.0922', '0.0558', '0.0295'),
(72, 0, 11, '0.1027', 0, 'aliffadullah24@gmail.com', '0.0922', '0.0558', '0.0295'),
(73, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1844', '0.1611', '0.0964'),
(74, 0, 3, '0.7958', 0, 'muhbintang650@gmail.com', '0.1614', '0.1432', '0.0826'),
(75, 0, 4, '0.5146', 0, 'feryfadulrahman@gmail.com', '0.1383', '0.0895', '0.0964'),
(76, 0, 5, '0.4055', 0, 'akmalryadilfitrah25@gmail.com', '0.1383', '0.0895', '0.0551'),
(77, 0, 6, '0.3716', 0, 'arjumnurramadhan21@gmail.com', '0.1383', '0.0895', '0.0413'),
(78, 0, 7, '0.3585', 0, 'basosamriadi34@gmail.com', '0.0922', '0.0895', '0.0826'),
(79, 0, 8, '0.0000', 0, 'fiqrihaikharanwar14@gmail.com', '0.0922', '0.0537', '0.0275'),
(80, 0, 9, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.0922', '0.0537', '0.0275'),
(81, 0, 10, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0922', '0.0537', '0.0275'),
(82, 0, 11, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0922', '0.0537', '0.0275'),
(83, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1786', '0.1591', '0.0964'),
(84, 0, 3, '0.7965', 0, 'muhbintang650@gmail.com', '0.1563', '0.1414', '0.0826'),
(85, 0, 4, '0.5165', 0, 'feryfadulrahman@gmail.com', '0.1340', '0.0884', '0.0964'),
(86, 0, 5, '0.4041', 0, 'akmalryadilfitrah25@gmail.com', '0.1340', '0.0884', '0.0551'),
(87, 0, 6, '0.3691', 0, 'arjumnurramadhan21@gmail.com', '0.1340', '0.0884', '0.0413'),
(88, 0, 7, '0.3632', 0, 'basosamriadi34@gmail.com', '0.0893', '0.0884', '0.0826'),
(89, 0, 8, '0.2848', 0, 'fiqrihaikharanwar14@gmail.com', '0.1340', '0.0707', '0.0275'),
(90, 0, 9, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.0893', '0.0530', '0.0275'),
(91, 0, 10, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0893', '0.0530', '0.0275'),
(92, 0, 11, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0893', '0.0530', '0.0275'),
(93, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1733', '0.1549', '0.0938'),
(94, 0, 3, '0.7966', 0, 'muhbintang650@gmail.com', '0.1516', '0.1376', '0.0804'),
(95, 0, 4, '0.5165', 0, 'feryfadulrahman@gmail.com', '0.1300', '0.0860', '0.0938'),
(96, 0, 5, '0.4039', 0, 'akmalryadilfitrah25@gmail.com', '0.1300', '0.0860', '0.0536'),
(97, 0, 6, '0.3689', 0, 'arjumnurramadhan21@gmail.com', '0.1300', '0.0860', '0.0402'),
(98, 0, 7, '0.3636', 0, 'basosamriadi34@gmail.com', '0.0866', '0.0860', '0.0804'),
(99, 0, 8, '0.2844', 0, 'fiqrihaikharanwar14@gmail.com', '0.1300', '0.0688', '0.0268'),
(100, 0, 9, '0.4039', 0, 'anonglasanisa18@gmail.com', '0.1300', '0.0860', '0.0536'),
(101, 0, 10, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0866', '0.0516', '0.0268'),
(102, 0, 11, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0866', '0.0516', '0.0268'),
(103, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1806', '0.1605', '0.0964'),
(104, 0, 3, '0.8251', 0, 'muhbintang650@gmail.com', '0.1580', '0.1427', '0.0826'),
(105, 0, 4, '0.5667', 0, 'feryfadulrahman@gmail.com', '0.1354', '0.0892', '0.0964'),
(106, 0, 5, '0.4908', 0, 'akmalryadilfitrah25@gmail.com', '0.1354', '0.0892', '0.0551'),
(107, 0, 6, '0.4644', 0, 'arjumnurramadhan21@gmail.com', '0.1354', '0.0892', '0.0413'),
(108, 0, 7, '0.4085', 0, 'basosamriadi34@gmail.com', '0.0903', '0.0892', '0.0826'),
(109, 0, 8, '0.3868', 0, 'fiqrihaikharanwar14@gmail.com', '0.1354', '0.0713', '0.0275'),
(110, 0, 9, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.0677', '0.0357', '0.0275'),
(111, 0, 10, '0.1557', 0, 'afriyusrifal@gmail.com', '0.0903', '0.0535', '0.0275'),
(112, 0, 11, '0.1557', 0, 'aliffadullah24@gmail.com', '0.0903', '0.0535', '0.0275'),
(113, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1762', '0.1521', '0.0964'),
(114, 0, 3, '0.7956', 0, 'muhbintang650@gmail.com', '0.1541', '0.1352', '0.0826'),
(115, 0, 4, '0.5229', 0, 'feryfadulrahman@gmail.com', '0.1321', '0.0845', '0.0964'),
(116, 0, 5, '0.4061', 0, 'akmalryadilfitrah25@gmail.com', '0.1321', '0.0845', '0.0551'),
(117, 0, 6, '0.3693', 0, 'arjumnurramadhan21@gmail.com', '0.1321', '0.0845', '0.0413'),
(118, 0, 7, '0.3661', 0, 'basosamriadi34@gmail.com', '0.0881', '0.0845', '0.0826'),
(119, 0, 8, '0.2863', 0, 'fiqrihaikharanwar14@gmail.com', '0.1321', '0.0676', '0.0275'),
(120, 0, 9, '0.3385', 0, 'anonglasanisa18@gmail.com', '0.1101', '0.1014', '0.0275'),
(121, 0, 10, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0881', '0.0507', '0.0275'),
(122, 0, 11, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0881', '0.0507', '0.0275'),
(123, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1786', '0.1591', '0.0964'),
(124, 0, 3, '0.7965', 0, 'muhbintang650@gmail.com', '0.1563', '0.1414', '0.0826'),
(125, 0, 4, '0.5165', 0, 'feryfadulrahman@gmail.com', '0.1340', '0.0884', '0.0964'),
(126, 0, 5, '0.4041', 0, 'akmalryadilfitrah25@gmail.com', '0.1340', '0.0884', '0.0551'),
(127, 0, 6, '0.3691', 0, 'arjumnurramadhan21@gmail.com', '0.1340', '0.0884', '0.0413'),
(128, 0, 7, '0.3632', 0, 'basosamriadi34@gmail.com', '0.0893', '0.0884', '0.0826'),
(129, 0, 8, '0.2848', 0, 'fiqrihaikharanwar14@gmail.com', '0.1340', '0.0707', '0.0275'),
(130, 0, 9, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.0893', '0.0530', '0.0275'),
(131, 0, 10, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0893', '0.0530', '0.0275'),
(132, 0, 11, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0893', '0.0530', '0.0275'),
(133, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1786', '0.1572', '0.0964'),
(134, 0, 3, '0.7961', 0, 'muhbintang650@gmail.com', '0.1563', '0.1397', '0.0826'),
(135, 0, 4, '0.5182', 0, 'feryfadulrahman@gmail.com', '0.1340', '0.0873', '0.0964'),
(136, 0, 5, '0.4049', 0, 'akmalryadilfitrah25@gmail.com', '0.1340', '0.0873', '0.0551'),
(137, 0, 6, '0.3695', 0, 'arjumnurramadhan21@gmail.com', '0.1340', '0.0873', '0.0413'),
(138, 0, 7, '0.3635', 0, 'basosamriadi34@gmail.com', '0.0893', '0.0873', '0.0826'),
(139, 0, 8, '0.2858', 0, 'fiqrihaikharanwar14@gmail.com', '0.1340', '0.0699', '0.0275'),
(140, 0, 9, '0.1091', 0, 'anonglasanisa18@gmail.com', '0.0893', '0.0699', '0.0275'),
(141, 0, 10, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0893', '0.0524', '0.0275'),
(142, 0, 11, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0893', '0.0524', '0.0275'),
(143, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1786', '0.1572', '0.0953'),
(144, 0, 3, '0.7961', 0, 'muhbintang650@gmail.com', '0.1563', '0.1397', '0.0816'),
(145, 0, 4, '0.5165', 0, 'feryfadulrahman@gmail.com', '0.1340', '0.0873', '0.0953'),
(146, 0, 5, '0.4049', 0, 'akmalryadilfitrah25@gmail.com', '0.1340', '0.0873', '0.0544'),
(147, 0, 6, '0.3702', 0, 'arjumnurramadhan21@gmail.com', '0.1340', '0.0873', '0.0408'),
(148, 0, 7, '0.3616', 0, 'basosamriadi34@gmail.com', '0.0893', '0.0873', '0.0816'),
(149, 0, 8, '0.2866', 0, 'fiqrihaikharanwar14@gmail.com', '0.1340', '0.0699', '0.0272'),
(150, 0, 9, '0.1398', 0, 'anonglasanisa18@gmail.com', '0.0893', '0.0699', '0.0408'),
(151, 0, 10, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0893', '0.0524', '0.0272'),
(152, 0, 11, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0893', '0.0524', '0.0272'),
(153, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1786', '0.1572', '0.0938'),
(154, 0, 3, '0.7961', 0, 'muhbintang650@gmail.com', '0.1563', '0.1397', '0.0804'),
(155, 0, 4, '0.5141', 0, 'feryfadulrahman@gmail.com', '0.1340', '0.0873', '0.0938'),
(156, 0, 5, '0.4049', 0, 'akmalryadilfitrah25@gmail.com', '0.1340', '0.0873', '0.0536'),
(157, 0, 6, '0.3711', 0, 'arjumnurramadhan21@gmail.com', '0.1340', '0.0873', '0.0402'),
(158, 0, 7, '0.3590', 0, 'basosamriadi34@gmail.com', '0.0893', '0.0873', '0.0804'),
(159, 0, 8, '0.2876', 0, 'fiqrihaikharanwar14@gmail.com', '0.1340', '0.0699', '0.0268'),
(160, 0, 9, '0.1960', 0, 'anonglasanisa18@gmail.com', '0.0893', '0.0699', '0.0536'),
(161, 0, 10, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0893', '0.0524', '0.0268'),
(162, 0, 11, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0893', '0.0524', '0.0268'),
(163, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1762', '0.1572', '0.0913'),
(164, 0, 3, '0.7965', 0, 'muhbintang650@gmail.com', '0.1541', '0.1397', '0.0783'),
(165, 0, 4, '0.5104', 0, 'feryfadulrahman@gmail.com', '0.1321', '0.0873', '0.0913'),
(166, 0, 5, '0.4041', 0, 'akmalryadilfitrah25@gmail.com', '0.1321', '0.0873', '0.0522'),
(167, 0, 6, '0.3713', 0, 'arjumnurramadhan21@gmail.com', '0.1321', '0.0873', '0.0391'),
(168, 0, 7, '0.3569', 0, 'basosamriadi34@gmail.com', '0.0881', '0.0873', '0.0783'),
(169, 0, 8, '0.2872', 0, 'fiqrihaikharanwar14@gmail.com', '0.1321', '0.0699', '0.0261'),
(170, 0, 9, '0.1945', 0, 'anonglasanisa18@gmail.com', '0.0881', '0.0699', '0.0522'),
(171, 0, 10, '0.2081', 0, 'afriyusrifal@gmail.com', '0.1101', '0.0524', '0.0522'),
(172, 0, 11, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0881', '0.0524', '0.0261'),
(173, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1786', '0.1572', '0.0913'),
(174, 0, 3, '0.7961', 0, 'muhbintang650@gmail.com', '0.1563', '0.1397', '0.0783'),
(175, 0, 4, '0.5104', 0, 'feryfadulrahman@gmail.com', '0.1340', '0.0873', '0.0913'),
(176, 0, 5, '0.4050', 0, 'akmalryadilfitrah25@gmail.com', '0.1340', '0.0873', '0.0522'),
(177, 0, 6, '0.3726', 0, 'arjumnurramadhan21@gmail.com', '0.1340', '0.0873', '0.0391'),
(178, 0, 7, '0.3549', 0, 'basosamriadi34@gmail.com', '0.0893', '0.0873', '0.0783'),
(179, 0, 8, '0.2893', 0, 'fiqrihaikharanwar14@gmail.com', '0.1340', '0.0699', '0.0261'),
(180, 0, 9, '0.1935', 0, 'anonglasanisa18@gmail.com', '0.0893', '0.0699', '0.0522'),
(181, 0, 10, '0.1542', 0, 'afriyusrifal@gmail.com', '0.0893', '0.0524', '0.0522'),
(182, 0, 11, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0893', '0.0524', '0.0261'),
(183, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1762', '0.1572', '0.0913'),
(184, 0, 3, '0.7965', 0, 'muhbintang650@gmail.com', '0.1541', '0.1397', '0.0783'),
(185, 0, 4, '0.5104', 0, 'feryfadulrahman@gmail.com', '0.1321', '0.0873', '0.0913'),
(186, 0, 5, '0.4041', 0, 'akmalryadilfitrah25@gmail.com', '0.1321', '0.0873', '0.0522'),
(187, 0, 6, '0.3713', 0, 'arjumnurramadhan21@gmail.com', '0.1321', '0.0873', '0.0391'),
(188, 0, 7, '0.3569', 0, 'basosamriadi34@gmail.com', '0.0881', '0.0873', '0.0783'),
(189, 0, 8, '0.2872', 0, 'fiqrihaikharanwar14@gmail.com', '0.1321', '0.0699', '0.0261'),
(190, 0, 9, '0.1945', 0, 'anonglasanisa18@gmail.com', '0.0881', '0.0699', '0.0522'),
(191, 0, 10, '0.1549', 0, 'afriyusrifal@gmail.com', '0.0881', '0.0524', '0.0522'),
(192, 0, 11, '0.1359', 0, 'aliffadullah24@gmail.com', '0.1101', '0.0524', '0.0261'),
(193, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1762', '0.1572', '0.0913'),
(194, 0, 3, '0.7965', 0, 'muhbintang650@gmail.com', '0.1541', '0.1397', '0.0783'),
(195, 0, 4, '0.5104', 0, 'feryfadulrahman@gmail.com', '0.1321', '0.0873', '0.0913'),
(196, 0, 5, '0.4041', 0, 'akmalryadilfitrah25@gmail.com', '0.1321', '0.0873', '0.0522'),
(197, 0, 6, '0.3713', 0, 'arjumnurramadhan21@gmail.com', '0.1321', '0.0873', '0.0391'),
(198, 0, 7, '0.3569', 0, 'basosamriadi34@gmail.com', '0.0881', '0.0873', '0.0783'),
(199, 0, 8, '0.2872', 0, 'fiqrihaikharanwar14@gmail.com', '0.1321', '0.0699', '0.0261'),
(200, 0, 9, '0.1945', 0, 'anonglasanisa18@gmail.com', '0.0881', '0.0699', '0.0522'),
(201, 0, 10, '0.1549', 0, 'afriyusrifal@gmail.com', '0.0881', '0.0524', '0.0522'),
(202, 0, 11, '0.1359', 0, 'aliffadullah24@gmail.com', '0.1101', '0.0524', '0.0261'),
(203, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1762', '0.1572', '0.0913'),
(204, 0, 3, '0.7965', 0, 'muhbintang650@gmail.com', '0.1541', '0.1397', '0.0783'),
(205, 0, 4, '0.5104', 0, 'feryfadulrahman@gmail.com', '0.1321', '0.0873', '0.0913'),
(206, 0, 5, '0.4041', 0, 'akmalryadilfitrah25@gmail.com', '0.1321', '0.0873', '0.0522'),
(207, 0, 6, '0.3713', 0, 'arjumnurramadhan21@gmail.com', '0.1321', '0.0873', '0.0391'),
(208, 0, 7, '0.3569', 0, 'basosamriadi34@gmail.com', '0.0881', '0.0873', '0.0783'),
(209, 0, 8, '0.2872', 0, 'fiqrihaikharanwar14@gmail.com', '0.1321', '0.0699', '0.0261'),
(210, 0, 9, '0.1945', 0, 'anonglasanisa18@gmail.com', '0.0881', '0.0699', '0.0522'),
(211, 0, 10, '0.1549', 0, 'afriyusrifal@gmail.com', '0.0881', '0.0524', '0.0522'),
(212, 0, 11, '0.1359', 0, 'aliffadullah24@gmail.com', '0.1101', '0.0524', '0.0261'),
(213, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1762', '0.1572', '0.0913'),
(214, 0, 3, '0.7965', 0, 'muhbintang650@gmail.com', '0.1541', '0.1397', '0.0783'),
(215, 0, 4, '0.5104', 0, 'feryfadulrahman@gmail.com', '0.1321', '0.0873', '0.0913'),
(216, 0, 5, '0.4041', 0, 'akmalryadilfitrah25@gmail.com', '0.1321', '0.0873', '0.0522'),
(217, 0, 6, '0.3713', 0, 'arjumnurramadhan21@gmail.com', '0.1321', '0.0873', '0.0391'),
(218, 0, 7, '0.3569', 0, 'basosamriadi34@gmail.com', '0.0881', '0.0873', '0.0783'),
(219, 0, 8, '0.2872', 0, 'fiqrihaikharanwar14@gmail.com', '0.1321', '0.0699', '0.0261'),
(220, 0, 9, '0.1945', 0, 'anonglasanisa18@gmail.com', '0.0881', '0.0699', '0.0522'),
(221, 0, 10, '0.1549', 0, 'afriyusrifal@gmail.com', '0.0881', '0.0524', '0.0522'),
(222, 0, 11, '0.1359', 0, 'aliffadullah24@gmail.com', '0.1101', '0.0524', '0.0261'),
(223, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1720', '0.1549', '0.0906'),
(224, 0, 3, '0.7968', 0, 'muhbintang650@gmail.com', '0.1505', '0.1376', '0.0776'),
(225, 0, 4, '0.5114', 0, 'feryfadulrahman@gmail.com', '0.1290', '0.0860', '0.0906'),
(226, 0, 5, '0.4035', 0, 'akmalryadilfitrah25@gmail.com', '0.1290', '0.0860', '0.0517'),
(227, 0, 6, '0.3702', 0, 'arjumnurramadhan21@gmail.com', '0.1290', '0.0860', '0.0388'),
(228, 0, 7, '0.3591', 0, 'basosamriadi34@gmail.com', '0.0860', '0.0860', '0.0776'),
(229, 0, 8, '0.2855', 0, 'fiqrihaikharanwar14@gmail.com', '0.1290', '0.0688', '0.0259'),
(230, 0, 9, '0.1957', 0, 'anonglasanisa18@gmail.com', '0.0860', '0.0688', '0.0517'),
(231, 0, 10, '0.1561', 0, 'afriyusrifal@gmail.com', '0.0860', '0.0516', '0.0517'),
(232, 0, 11, '0.1349', 0, 'aliffadullah24@gmail.com', '0.1075', '0.0516', '0.0259'),
(233, 0, 12, '0.0000', 0, 'mira@gmail.com', '0.0860', '0.0516', '0.0259'),
(234, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1720', '0.1549', '0.0906'),
(235, 0, 3, '0.7968', 0, 'muhbintang650@gmail.com', '0.1505', '0.1376', '0.0776'),
(236, 0, 4, '0.5114', 0, 'feryfadulrahman@gmail.com', '0.1290', '0.0860', '0.0906'),
(237, 0, 5, '0.4035', 0, 'akmalryadilfitrah25@gmail.com', '0.1290', '0.0860', '0.0517'),
(238, 0, 6, '0.3702', 0, 'arjumnurramadhan21@gmail.com', '0.1290', '0.0860', '0.0388'),
(239, 0, 7, '0.3591', 0, 'basosamriadi34@gmail.com', '0.0860', '0.0860', '0.0776'),
(240, 0, 8, '0.2855', 0, 'fiqrihaikharanwar14@gmail.com', '0.1290', '0.0688', '0.0259'),
(241, 0, 9, '0.1957', 0, 'anonglasanisa18@gmail.com', '0.0860', '0.0688', '0.0517'),
(242, 0, 10, '0.1561', 0, 'afriyusrifal@gmail.com', '0.0860', '0.0516', '0.0517'),
(243, 0, 11, '0.1349', 0, 'aliffadullah24@gmail.com', '0.1075', '0.0516', '0.0259'),
(244, 0, 12, '0.0000', 0, 'mira@gmail.com', '0.0860', '0.0516', '0.0259'),
(245, 0, 2, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1612', '0.1484', '0.0884'),
(246, 0, 3, '0.7976', 0, 'muhbintang650@gmail.com', '0.1411', '0.1319', '0.0757'),
(247, 0, 4, '0.5142', 0, 'feryfadulrahman@gmail.com', '0.1209', '0.0824', '0.0884'),
(248, 0, 5, '0.4020', 0, 'akmalryadilfitrah25@gmail.com', '0.1209', '0.0824', '0.0505'),
(249, 0, 6, '0.3672', 0, 'arjumnurramadhan21@gmail.com', '0.1209', '0.0824', '0.0379'),
(250, 0, 7, '0.3650', 0, 'basosamriadi34@gmail.com', '0.0806', '0.0824', '0.0757'),
(251, 0, 8, '0.2811', 0, 'fiqrihaikharanwar14@gmail.com', '0.1209', '0.0660', '0.0252'),
(252, 0, 9, '0.1990', 0, 'anonglasanisa18@gmail.com', '0.0806', '0.0660', '0.0505'),
(253, 0, 10, '0.1594', 0, 'afriyusrifal@gmail.com', '0.0806', '0.0495', '0.0505'),
(254, 0, 11, '0.1324', 0, 'aliffadullah24@gmail.com', '0.1008', '0.0495', '0.0252'),
(255, 0, 12, '0.0000', 0, 'mira@gmail.com', '0.0806', '0.0495', '0.0252'),
(256, 0, 13, '0.0000', 0, 'dayat@gmail.com', '0.0806', '0.0495', '0.0252'),
(257, 0, 14, '0.0000', 0, 'kiel@gmail.com', '0.0806', '0.0495', '0.0252'),
(258, 0, 15, '0.0000', 0, 'regi@gmail.com', '0.0806', '0.0495', '0.0252'),
(259, 0, 17, '0.0000', 0, 'ooka@gmail.com', '0.2828', '0.2121', '0.1414'),
(260, 0, 18, '0.0000', 0, 'frenky@gmail.com', '0.2828', '0.2121', '0.1414'),
(261, 0, 17, '0.0000', 0, 'ooka@gmail.com', '0.2828', '0.2121', '0.1414'),
(262, 0, 18, '0.0000', 0, 'frenky@gmail.com', '0.2828', '0.2121', '0.1414'),
(263, 0, 17, '0.0000', 0, 'ooka@gmail.com', '0.2828', '0.2121', '0.1414'),
(264, 0, 18, '0.0000', 0, 'frenky@gmail.com', '0.2828', '0.2121', '0.1414'),
(265, 0, 17, '0.0000', 0, 'ooka@gmail.com', '0.2828', '0.2121', '0.1414'),
(266, 0, 18, '0.0000', 0, 'frenky@gmail.com', '0.2828', '0.2121', '0.1414'),
(267, 0, 19, '0.0000', 0, 'hamkairsal23@gmail.com', '0.2000', '0.1500', '0.1000'),
(268, 0, 20, '0.0000', 0, 'muhbintang650@gmail.com', '0.2000', '0.1500', '0.1000'),
(269, 0, 21, '0.0000', 0, 'feryfadulrahman@gmail.com', '0.2000', '0.1500', '0.1000'),
(270, 0, 22, '0.0000', 0, 'akmalryadilfitrah25@gmail.com', '0.2000', '0.1500', '0.1000'),
(271, 0, 19, '0.0000', 0, 'hamkairsal23@gmail.com', '0.1265', '0.0949', '0.0632'),
(272, 0, 20, '0.0000', 0, 'muhbintang650@gmail.com', '0.1265', '0.0949', '0.0632'),
(273, 0, 21, '0.0000', 0, 'feryfadulrahman@gmail.com', '0.1265', '0.0949', '0.0632'),
(274, 0, 22, '0.0000', 0, 'akmalryadilfitrah25@gmail.com', '0.1265', '0.0949', '0.0632'),
(275, 0, 23, '0.0000', 0, 'arjumnurramadhan21@gmail.com', '0.1265', '0.0949', '0.0632'),
(276, 0, 24, '0.0000', 0, 'basosamriadi34@gmail.com', '0.1265', '0.0949', '0.0632'),
(277, 0, 25, '0.0000', 0, 'fiqrihaikharanwar14@gmail.com', '0.1265', '0.0949', '0.0632'),
(278, 0, 26, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.1265', '0.0949', '0.0632'),
(279, 0, 27, '0.0000', 0, 'afriyusrifal@gmail.com', '0.1265', '0.0949', '0.0632'),
(280, 0, 28, '0.0000', 0, 'aliffadullah24@gmail.com', '0.1265', '0.0949', '0.0632'),
(281, 0, 19, '1.0000', 0, 'hamkairsal23@gmail.com', '0.2828', '0.2400', '0.1897'),
(282, 0, 20, '0.0000', 0, 'muhbintang650@gmail.com', '0.0943', '0.0600', '0.0211'),
(283, 0, 21, '0.0000', 0, 'feryfadulrahman@gmail.com', '0.0943', '0.0600', '0.0211'),
(284, 0, 22, '0.0000', 0, 'akmalryadilfitrah25@gmail.com', '0.0943', '0.0600', '0.0211'),
(285, 0, 23, '0.0000', 0, 'arjumnurramadhan21@gmail.com', '0.0943', '0.0600', '0.0211'),
(286, 0, 24, '0.0000', 0, 'basosamriadi34@gmail.com', '0.0943', '0.0600', '0.0211'),
(287, 0, 25, '0.0000', 0, 'fiqrihaikharanwar14@gmail.com', '0.0943', '0.0600', '0.0211'),
(288, 0, 26, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.0943', '0.0600', '0.0211'),
(289, 0, 27, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0943', '0.0600', '0.0211'),
(290, 0, 28, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0943', '0.0600', '0.0211'),
(291, 0, 19, '1.0000', 0, 'hamkairsal23@gmail.com', '0.2444', '0.1897', '0.1532'),
(292, 0, 20, '0.8358', 0, 'muhbintang650@gmail.com', '0.2172', '0.1897', '0.1192'),
(293, 0, 21, '0.0000', 0, 'feryfadulrahman@gmail.com', '0.0815', '0.0474', '0.0170'),
(294, 0, 22, '0.0000', 0, 'akmalryadilfitrah25@gmail.com', '0.0815', '0.0474', '0.0170'),
(295, 0, 23, '0.0000', 0, 'arjumnurramadhan21@gmail.com', '0.0815', '0.0474', '0.0170'),
(296, 0, 24, '0.0000', 0, 'basosamriadi34@gmail.com', '0.0815', '0.0474', '0.0170'),
(297, 0, 25, '0.0000', 0, 'fiqrihaikharanwar14@gmail.com', '0.0815', '0.0474', '0.0170'),
(298, 0, 26, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.0815', '0.0474', '0.0170'),
(299, 0, 27, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0815', '0.0474', '0.0170'),
(300, 0, 28, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0815', '0.0474', '0.0170'),
(301, 0, 19, '1.0000', 0, 'hamkairsal23@gmail.com', '0.2444', '0.1897', '0.1455'),
(302, 0, 20, '0.8778', 0, 'muhbintang650@gmail.com', '0.2172', '0.1897', '0.1294'),
(303, 0, 21, '0.0000', 0, 'feryfadulrahman@gmail.com', '0.0815', '0.0474', '0.0162'),
(304, 0, 22, '0.0000', 0, 'akmalryadilfitrah25@gmail.com', '0.0815', '0.0474', '0.0162'),
(305, 0, 23, '0.0000', 0, 'arjumnurramadhan21@gmail.com', '0.0815', '0.0474', '0.0162'),
(306, 0, 24, '0.0000', 0, 'basosamriadi34@gmail.com', '0.0815', '0.0474', '0.0162'),
(307, 0, 25, '0.0000', 0, 'fiqrihaikharanwar14@gmail.com', '0.0815', '0.0474', '0.0162'),
(308, 0, 26, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.0815', '0.0474', '0.0162'),
(309, 0, 27, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0815', '0.0474', '0.0162'),
(310, 0, 28, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0815', '0.0474', '0.0162'),
(311, 0, 19, '0.9167', 0, 'hamkairsal23@gmail.com', '0.2444', '0.1804', '0.1455'),
(312, 0, 20, '0.8823', 0, 'muhbintang650@gmail.com', '0.2172', '0.2029', '0.1294'),
(313, 0, 21, '0.0000', 0, 'feryfadulrahman@gmail.com', '0.0815', '0.0451', '0.0162'),
(314, 0, 22, '0.0000', 0, 'akmalryadilfitrah25@gmail.com', '0.0815', '0.0451', '0.0162'),
(315, 0, 23, '0.0000', 0, 'arjumnurramadhan21@gmail.com', '0.0815', '0.0451', '0.0162'),
(316, 0, 24, '0.0000', 0, 'basosamriadi34@gmail.com', '0.0815', '0.0451', '0.0162'),
(317, 0, 25, '0.0000', 0, 'fiqrihaikharanwar14@gmail.com', '0.0815', '0.0451', '0.0162'),
(318, 0, 26, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.0815', '0.0451', '0.0162'),
(319, 0, 27, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0815', '0.0451', '0.0162'),
(320, 0, 28, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0815', '0.0451', '0.0162'),
(321, 0, 19, '0.9156', 0, 'hamkairsal23@gmail.com', '0.2444', '0.1804', '0.1381'),
(322, 0, 20, '0.8990', 0, 'muhbintang650@gmail.com', '0.2172', '0.2029', '0.1381'),
(323, 0, 21, '0.0000', 0, 'feryfadulrahman@gmail.com', '0.0815', '0.0451', '0.0153'),
(324, 0, 22, '0.0000', 0, 'akmalryadilfitrah25@gmail.com', '0.0815', '0.0451', '0.0153'),
(325, 0, 23, '0.0000', 0, 'arjumnurramadhan21@gmail.com', '0.0815', '0.0451', '0.0153'),
(326, 0, 24, '0.0000', 0, 'basosamriadi34@gmail.com', '0.0815', '0.0451', '0.0153'),
(327, 0, 25, '0.0000', 0, 'fiqrihaikharanwar14@gmail.com', '0.0815', '0.0451', '0.0153'),
(328, 0, 26, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.0815', '0.0451', '0.0153'),
(329, 0, 27, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0815', '0.0451', '0.0153'),
(330, 0, 28, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0815', '0.0451', '0.0153'),
(331, 0, 19, '1.0000', 0, 'hamkairsal23@gmail.com', '0.2444', '0.1938', '0.1381'),
(332, 0, 20, '0.8972', 0, 'muhbintang650@gmail.com', '0.2172', '0.1938', '0.1381'),
(333, 0, 21, '0.0000', 0, 'feryfadulrahman@gmail.com', '0.0815', '0.0431', '0.0153'),
(334, 0, 22, '0.0000', 0, 'akmalryadilfitrah25@gmail.com', '0.0815', '0.0431', '0.0153'),
(335, 0, 23, '0.0000', 0, 'arjumnurramadhan21@gmail.com', '0.0815', '0.0431', '0.0153'),
(336, 0, 24, '0.0000', 0, 'basosamriadi34@gmail.com', '0.0815', '0.0431', '0.0153'),
(337, 0, 25, '0.0000', 0, 'fiqrihaikharanwar14@gmail.com', '0.0815', '0.0431', '0.0153'),
(338, 0, 26, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.0815', '0.0431', '0.0153'),
(339, 0, 27, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0815', '0.0431', '0.0153'),
(340, 0, 28, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0815', '0.0431', '0.0153'),
(341, 0, 19, '1.0000', 0, 'hamkairsal23@gmail.com', '0.2118', '0.1694', '0.1219'),
(342, 0, 20, '0.8980', 0, 'muhbintang650@gmail.com', '0.1882', '0.1694', '0.1219'),
(343, 0, 21, '0.8573', 0, 'feryfadulrahman@gmail.com', '0.2118', '0.1506', '0.0948'),
(344, 0, 22, '0.0000', 0, 'akmalryadilfitrah25@gmail.com', '0.0706', '0.0376', '0.0135'),
(345, 0, 23, '0.0000', 0, 'arjumnurramadhan21@gmail.com', '0.0706', '0.0376', '0.0135'),
(346, 0, 24, '0.0000', 0, 'basosamriadi34@gmail.com', '0.0706', '0.0376', '0.0135'),
(347, 0, 25, '0.0000', 0, 'fiqrihaikharanwar14@gmail.com', '0.0706', '0.0376', '0.0135'),
(348, 0, 26, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.0706', '0.0376', '0.0135'),
(349, 0, 27, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0706', '0.0376', '0.0135'),
(350, 0, 28, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0706', '0.0376', '0.0135'),
(351, 0, 19, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1941', '0.1484', '0.1104'),
(352, 0, 20, '0.8961', 0, 'muhbintang650@gmail.com', '0.1725', '0.1484', '0.1104'),
(353, 0, 21, '0.8581', 0, 'feryfadulrahman@gmail.com', '0.1941', '0.1319', '0.0858'),
(354, 0, 22, '0.8422', 0, 'akmalryadilfitrah25@gmail.com', '0.1725', '0.1484', '0.0858'),
(355, 0, 23, '0.0000', 0, 'arjumnurramadhan21@gmail.com', '0.0647', '0.0330', '0.0123'),
(356, 0, 24, '0.0000', 0, 'basosamriadi34@gmail.com', '0.0647', '0.0330', '0.0123'),
(357, 0, 25, '0.0000', 0, 'fiqrihaikharanwar14@gmail.com', '0.0647', '0.0330', '0.0123'),
(358, 0, 26, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.0647', '0.0330', '0.0123'),
(359, 0, 27, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0647', '0.0330', '0.0123'),
(360, 0, 28, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0647', '0.0330', '0.0123'),
(361, 0, 19, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1837', '0.1392', '0.0992'),
(362, 0, 20, '0.8945', 0, 'muhbintang650@gmail.com', '0.1633', '0.1392', '0.0992'),
(363, 0, 21, '0.8613', 0, 'feryfadulrahman@gmail.com', '0.1837', '0.1238', '0.0772'),
(364, 0, 22, '0.8442', 0, 'akmalryadilfitrah25@gmail.com', '0.1633', '0.1392', '0.0772'),
(365, 0, 23, '0.7225', 0, 'arjumnurramadhan21@gmail.com', '0.1429', '0.1083', '0.0882'),
(366, 0, 24, '0.0000', 0, 'basosamriadi34@gmail.com', '0.0612', '0.0309', '0.0110'),
(367, 0, 25, '0.0000', 0, 'fiqrihaikharanwar14@gmail.com', '0.0612', '0.0309', '0.0110'),
(368, 0, 26, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.0612', '0.0309', '0.0110'),
(369, 0, 27, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0612', '0.0309', '0.0110'),
(370, 0, 28, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0612', '0.0309', '0.0110'),
(371, 0, 19, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1748', '0.1337', '0.0943'),
(372, 0, 20, '0.8948', 0, 'muhbintang650@gmail.com', '0.1554', '0.1337', '0.0943'),
(373, 0, 21, '0.8614', 0, 'feryfadulrahman@gmail.com', '0.1748', '0.1188', '0.0734'),
(374, 0, 22, '0.8448', 0, 'akmalryadilfitrah25@gmail.com', '0.1554', '0.1337', '0.0734'),
(375, 0, 23, '0.7224', 0, 'arjumnurramadhan21@gmail.com', '0.1360', '0.1040', '0.0839'),
(376, 0, 24, '0.6237', 0, 'basosamriadi34@gmail.com', '0.1360', '0.0891', '0.0629'),
(377, 0, 25, '0.0000', 0, 'fiqrihaikharanwar14@gmail.com', '0.0583', '0.0297', '0.0105'),
(378, 0, 26, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.0583', '0.0297', '0.0105'),
(379, 0, 27, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0583', '0.0297', '0.0105'),
(380, 0, 28, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0583', '0.0297', '0.0105'),
(381, 0, 19, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1695', '0.1269', '0.0914'),
(382, 0, 20, '0.8939', 0, 'muhbintang650@gmail.com', '0.1507', '0.1269', '0.0914'),
(383, 0, 21, '0.8615', 0, 'feryfadulrahman@gmail.com', '0.1695', '0.1128', '0.0711'),
(384, 0, 22, '0.8436', 0, 'akmalryadilfitrah25@gmail.com', '0.1507', '0.1269', '0.0711'),
(385, 0, 23, '0.7224', 0, 'arjumnurramadhan21@gmail.com', '0.1318', '0.0987', '0.0812'),
(386, 0, 24, '0.6245', 0, 'basosamriadi34@gmail.com', '0.1318', '0.0846', '0.0609'),
(387, 0, 25, '0.5688', 0, 'fiqrihaikharanwar14@gmail.com', '0.1130', '0.0987', '0.0508'),
(388, 0, 26, '0.0000', 0, 'anonglasanisa18@gmail.com', '0.0565', '0.0282', '0.0102'),
(389, 0, 27, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0565', '0.0282', '0.0102'),
(390, 0, 28, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0565', '0.0282', '0.0102'),
(391, 0, 19, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1666', '0.1240', '0.0897'),
(392, 0, 20, '0.8937', 0, 'muhbintang650@gmail.com', '0.1481', '0.1240', '0.0897'),
(393, 0, 21, '0.8616', 0, 'feryfadulrahman@gmail.com', '0.1666', '0.1102', '0.0697'),
(394, 0, 22, '0.8434', 0, 'akmalryadilfitrah25@gmail.com', '0.1481', '0.1240', '0.0697'),
(395, 0, 23, '0.7224', 0, 'arjumnurramadhan21@gmail.com', '0.1296', '0.0965', '0.0797'),
(396, 0, 24, '0.6246', 0, 'basosamriadi34@gmail.com', '0.1296', '0.0827', '0.0598'),
(397, 0, 25, '0.5684', 0, 'fiqrihaikharanwar14@gmail.com', '0.1111', '0.0965', '0.0498'),
(398, 0, 26, '0.3754', 0, 'anonglasanisa18@gmail.com', '0.0925', '0.0689', '0.0399'),
(399, 0, 27, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0555', '0.0276', '0.0100'),
(400, 0, 28, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0555', '0.0276', '0.0100'),
(401, 0, 19, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1666', '0.1240', '0.0875'),
(402, 0, 20, '0.8931', 0, 'muhbintang650@gmail.com', '0.1481', '0.1240', '0.0875'),
(403, 0, 21, '0.8631', 0, 'feryfadulrahman@gmail.com', '0.1666', '0.1102', '0.0681'),
(404, 0, 22, '0.8445', 0, 'akmalryadilfitrah25@gmail.com', '0.1481', '0.1240', '0.0681'),
(405, 0, 23, '0.7210', 0, 'arjumnurramadhan21@gmail.com', '0.1296', '0.0965', '0.0778'),
(406, 0, 24, '0.6246', 0, 'basosamriadi34@gmail.com', '0.1296', '0.0827', '0.0583'),
(407, 0, 25, '0.5691', 0, 'fiqrihaikharanwar14@gmail.com', '0.1111', '0.0965', '0.0486'),
(408, 0, 26, '0.4325', 0, 'anonglasanisa18@gmail.com', '0.0925', '0.0689', '0.0583'),
(409, 0, 27, '0.0000', 0, 'afriyusrifal@gmail.com', '0.0555', '0.0276', '0.0097'),
(410, 0, 28, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0555', '0.0276', '0.0097'),
(411, 0, 19, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1620', '0.1225', '0.0860'),
(412, 0, 20, '0.8940', 0, 'muhbintang650@gmail.com', '0.1440', '0.1225', '0.0860'),
(413, 0, 21, '0.8624', 0, 'feryfadulrahman@gmail.com', '0.1620', '0.1089', '0.0669'),
(414, 0, 22, '0.8449', 0, 'akmalryadilfitrah25@gmail.com', '0.1440', '0.1225', '0.0669'),
(415, 0, 23, '0.7216', 0, 'arjumnurramadhan21@gmail.com', '0.1260', '0.0953', '0.0765'),
(416, 0, 24, '0.6241', 0, 'basosamriadi34@gmail.com', '0.1260', '0.0816', '0.0573'),
(417, 0, 25, '0.5702', 0, 'fiqrihaikharanwar14@gmail.com', '0.1080', '0.0953', '0.0478'),
(418, 0, 26, '0.4334', 0, 'anonglasanisa18@gmail.com', '0.0900', '0.0680', '0.0573'),
(419, 0, 27, '0.4030', 0, 'afriyusrifal@gmail.com', '0.1080', '0.0544', '0.0382'),
(420, 0, 28, '0.0000', 0, 'aliffadullah24@gmail.com', '0.0540', '0.0272', '0.0096'),
(421, 0, 19, '1.0000', 0, 'hamkairsal23@gmail.com', '0.1577', '0.1218', '0.0852'),
(422, 0, 20, '0.8649', 0, 'muhbintang650@gmail.com', '0.1402', '0.1218', '0.0852'),
(423, 0, 21, '0.8179', 0, 'feryfadulrahman@gmail.com', '0.1577', '0.1083', '0.0663'),
(424, 0, 22, '0.8011', 0, 'akmalryadilfitrah25@gmail.com', '0.1402', '0.1218', '0.0663'),
(425, 0, 23, '0.6386', 0, 'arjumnurramadhan21@gmail.com', '0.1227', '0.0948', '0.0758'),
(426, 0, 24, '0.5000', 0, 'basosamriadi34@gmail.com', '0.1227', '0.0812', '0.0568'),
(427, 0, 25, '0.4607', 0, 'fiqrihaikharanwar14@gmail.com', '0.1051', '0.0948', '0.0474'),
(428, 0, 26, '0.2967', 0, 'anonglasanisa18@gmail.com', '0.0876', '0.0677', '0.0568'),
(429, 0, 27, '0.1974', 0, 'afriyusrifal@gmail.com', '0.1051', '0.0542', '0.0379'),
(430, 0, 28, '0.1351', 0, 'aliffadullah24@gmail.com', '0.1051', '0.0406', '0.0284');

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
(32, 4, 'toilet perempuan', 0),
(33, 0, 'swwsw', 1);

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
-- Table structure for table `umum`
--

CREATE TABLE `umum` (
  `id_umum` int(11) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `janji_layanan` text NOT NULL,
  `tupoksi_kerja` text NOT NULL,
  `alur_pelaporan` text NOT NULL,
  `struktur_organisasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `umum`
--

INSERT INTO `umum` (`id_umum`, `visi`, `misi`, `janji_layanan`, `tupoksi_kerja`, `alur_pelaporan`, `struktur_organisasi`) VALUES
(4, 'Menjadi Perguruan Tinggi Vokasi Yang Unggul di Indonesia dan Mampu S+Bersaing Secara Global', 'Menjadi Perguruan Tinggi Vokasi Yang Unggul di Indonesia dan Mampu S+Bersaing Secara Global', 'Menjadi Perguruan Tinggi Vokasi Yang Unggul di Indonesia dan Mampu S+Bersaing Secara Global', 'Menjadi Perguruan Tinggi Vokasi Yang Unggul di Indonesia dan Mampu S+Bersaing Secara Global', 'Menjadi Perguruan Tinggi Vokasi Yang Unggul di Indonesia dan Mampu S+Bersaing Secara Global', 'Menjadi Perguruan Tinggi Vokasi Yang Unggul di Indonesia dan Mampu S+Bersaing Secara Global');

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
  `username` varchar(20) NOT NULL,
  `is_auto_registered` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_pengguna`, `email`, `password`, `id_role`, `id_level`, `status`, `deleted`, `timestamp`, `username`, `is_auto_registered`) VALUES
(1, 'admin', 'sinfo.pengaduan@gmail.com', '0192023a7bbd73250516f069df18b500', 3, 5, 1, 0, '2024-07-04 22:43:05', 'admin', 0),
(22, 'pimpinan', 'pimpinan@gmail.com', '$2y$10$KmR15pNMlwKI8Gc9ZUuRSu/2u5oDe.5aIIB16EeezkPRRpy9KyNNS', 3, 2, 1, 0, '2024-08-25 05:54:18', 'pimpinan', 0),
(83, '', 'hamkairsal23@gmail.com', '$2y$10$QxJQajQqT3Auvr5ZDHrYEuZZP4G0jiDVYMNxbO5eGLGmLlyCDZGkS', 1, 1, 1, 0, '2024-09-23 15:18:17', '', 1),
(84, '', 'muhbintang650@gmail.com', '$2y$10$e7kBvupSHpQRlF95vrnISulz3lzV/EZtOK45LEfTfOq9.RVe8vUTW', 1, 1, 1, 0, '2024-09-23 15:21:09', '', 1),
(85, '', 'feryfadulrahman@gmail.com', '$2y$10$1I04KyTwt5btRIlp/y6coOqXwNGyxxIx/AJc/EPqe6KbRhVcjnxuG', 1, 1, 1, 0, '2024-09-23 15:22:34', '', 1),
(86, '', 'akmalryadilfitrah25@gmail.com', '$2y$10$VfcseM0fkH47u4a9hWeFDOmUKUR2y6M1w8icMCE5VJHkmyP331cZS', 1, 1, 1, 0, '2024-09-23 15:24:59', '', 1),
(87, '', 'arjumnurramadhan21@gmail.com', '$2y$10$HLoGX0.H0lf2kuymfuug7u10VQVR4XVfhhckA9SRBxjrpxz.9AP4.', 1, 1, 1, 0, '2024-09-23 16:10:19', '', 1),
(88, '', 'basosamriadi34@gmail.com', '$2y$10$yRPsqfEP/5SBhlS43/ecqOe6lgsdSttSg/rweIC1Ze36L01oNBVrG', 1, 1, 1, 0, '2024-09-23 16:14:56', '', 1),
(89, '', 'fiqrihaikharanwar14@gmail.com', '$2y$10$y7lyCNhgNt/MXBihfgWusOa2tJL147jYVyNAtzbxR6ClgZjv.ZKcC', 1, 1, 1, 0, '2024-09-23 16:17:05', '', 1),
(90, '', 'anonglasanisa18@gmail.com', '$2y$10$Jx3FXpKLWuHxk2e8WHVF..w6g.mabJ/RK1AbxAsFPJNtOlLxqynUG', 1, 1, 1, 0, '2024-09-23 16:18:36', '', 1),
(91, '', 'afriyusrifal@gmail.com', '$2y$10$8rscxJGpABX/LQjWL0WXBuz5dywKuemZ8V4Ijyq7hz48n7YQnF7h2', 1, 1, 1, 0, '2024-09-23 16:20:25', '', 1),
(92, '', 'aliffadullah24@gmail.com', '$2y$10$Lqhnkiit3QPpGrsWy.oNFuzWbXWAfZxB74AKfUxcEpUXqbKKxPiMG', 1, 1, 1, 0, '2024-09-23 16:22:32', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

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
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

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
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_messages`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_ranking`);

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
-- Indexes for table `umum`
--
ALTER TABLE `umum`
  ADD PRIMARY KEY (`id_umum`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_messages` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id_ranking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=431;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
-- AUTO_INCREMENT for table `umum`
--
ALTER TABLE `umum`
  MODIFY `id_umum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
