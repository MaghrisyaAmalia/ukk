-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2018 at 10:07 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ukuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id_pegawai_pengirim` int(11) NOT NULL,
  `id_pegawai_penerima` int(11) NOT NULL,
  `tgl_disposisi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keterangan` text NOT NULL,
  `file_surat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id_disposisi`, `id_surat`, `id_pegawai_pengirim`, `id_pegawai_penerima`, `tgl_disposisi`, `keterangan`, `file_surat`) VALUES
(1, 6, 1, 1, '2018-02-13 01:16:31', 'dada', 'VALIDASI_FORM_CODEIGNITER.pdf'),
(6, 6, 2, 2, '2018-02-15 17:00:00', 'rer', 'VALIDASI_FORM_CODEIGNITER12.pdf'),
(9, 8, 2, 2, '2018-02-07 17:00:00', 'dfsfdf', 'VALIDASI_FORM_CODEIGNITER16.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `level`) VALUES
(1, 'Sekretaris', 1),
(2, 'Kepala Sekolah', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nik`, `nama`, `id_jabatan`, `password`) VALUES
(1, 101, 'Sekretaris', 1, '0101'),
(2, 222, 'Kepala Sekolah', 2, '222');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_suratkeluar` int(11) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `file_surat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_suratkeluar`, `nomor_surat`, `tgl_kirim`, `penerima`, `perihal`, `file_surat`) VALUES
(1, '34344', '2018-02-06', 'efdfgd', 'gfgdfgfg', 'INSERT_DATA_CODEIGNITER.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat` int(11) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `tgl_terima` date NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `file_surat` text NOT NULL,
  `proses` enum('proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat`, `nomor_surat`, `tgl_kirim`, `tgl_terima`, `pengirim`, `penerima`, `perihal`, `file_surat`, `proses`) VALUES
(2, 'sdf', '2018-02-06', '2018-02-10', 'sds', 'sfsfsffdfdf', 'sfsfsdeeee', 'VALIDASI_FORM_CODEIGNITER.pdf', 'proses'),
(6, '42355', '2018-02-14', '2018-02-15', 'fgfgf', 'fgfgf', 'fgfgfg', 'MAILER.pdf', 'proses'),
(7, '546563trt', '2018-02-09', '2018-02-09', 'fghfhgh', 'ghgh434343', 'ghghg', 'INSERT_DATA_CODEIGNITER.pdf', 'proses'),
(8, '56565', '2018-02-13', '2018-02-09', 'ytyty', 'tyyty', 'tytyt', 'MAILER1.pdf', 'proses'),
(10, '1211', '2018-02-15', '2018-02-09', 'ggg', 'fgfgf', 'ffgf', 'VALIDASI_FORM_CODEIGNITER17.pdf', 'proses');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`),
  ADD KEY `id_surat` (`id_surat`),
  ADD KEY `id_pegawai_pengirim` (`id_pegawai_pengirim`),
  ADD KEY `id_pegawai_penerima` (`id_pegawai_penerima`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_suratkeluar`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_suratkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat_masuk` (`id_surat`),
  ADD CONSTRAINT `disposisi_ibfk_2` FOREIGN KEY (`id_pegawai_penerima`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
