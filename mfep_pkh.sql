-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 04:58 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mfep_pkh`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(15) NOT NULL,
  `admin_tempat` text NOT NULL,
  `admin_lahir` date NOT NULL,
  `admin_notelp` varchar(12) NOT NULL,
  `admin_email` varchar(15) NOT NULL,
  `admin_jk` varchar(10) NOT NULL,
  `admin_username` varchar(10) NOT NULL,
  `admin_password` varchar(10) NOT NULL,
  `admin_alamat` text NOT NULL,
  `admin_foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_nama`, `admin_tempat`, `admin_lahir`, `admin_notelp`, `admin_email`, `admin_jk`, `admin_username`, `admin_password`, `admin_alamat`, `admin_foto`) VALUES
(7, 'admin', '', '0000-00-00', '', '', '', 'admin', '21232f297a', '', 'ronaldo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `kriteria_id` int(11) NOT NULL,
  `kriteria_nama` varchar(100) NOT NULL,
  `kriteria_bobot` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`kriteria_id`, `kriteria_nama`, `kriteria_bobot`) VALUES
(1, 'Ibu Hamil', '0.17'),
(2, 'Anak Usia Dini', '0.17'),
(3, 'Anak SD', '0.06'),
(4, 'Anak SMP', '0.11'),
(5, 'Anak SMA', '0.15'),
(6, 'Disabilitas Berat', '0.17'),
(7, 'Lanjut Usia', '0.17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_normalisasi`
--

CREATE TABLE `tbl_normalisasi` (
  `normalisasi_id` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `nilai_ibu_hamil` decimal(10,2) NOT NULL,
  `nilai_usia_dini` decimal(10,2) NOT NULL,
  `nilai_sd` decimal(10,2) NOT NULL,
  `nilai_smp` decimal(10,2) NOT NULL,
  `nilai_sma` decimal(10,2) NOT NULL,
  `nilai_disabilitas` decimal(10,2) NOT NULL,
  `nilai_lanjut_usia` decimal(10,2) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_normalisasi`
--

INSERT INTO `tbl_normalisasi` (`normalisasi_id`, `id_penduduk`, `nilai_ibu_hamil`, `nilai_usia_dini`, `nilai_sd`, `nilai_smp`, `nilai_sma`, `nilai_disabilitas`, `nilai_lanjut_usia`, `tgl_input`) VALUES
(87, 42, '0.00', '10.00', '10.00', '10.00', '0.00', '10.00', '10.00', '2023-06-22 15:57:59'),
(88, 41, '10.00', '0.00', '0.00', '10.00', '0.00', '0.00', '10.00', '2023-06-22 15:58:24'),
(89, 40, '0.00', '0.00', '10.00', '0.00', '10.00', '10.00', '0.00', '2023-06-22 15:58:54'),
(90, 39, '10.00', '10.00', '0.00', '10.00', '0.00', '0.00', '10.00', '2023-06-22 15:59:19'),
(91, 38, '0.00', '10.00', '10.00', '0.00', '10.00', '0.00', '10.00', '2023-06-22 15:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penduduk`
--

CREATE TABLE `tbl_penduduk` (
  `id_penduduk` int(11) NOT NULL,
  `nama_penduduk` varchar(15) NOT NULL,
  `jk_penduduk` varchar(10) NOT NULL,
  `alamat_penduduk` text NOT NULL,
  `nohp_penduduk` varchar(12) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penduduk`
--

INSERT INTO `tbl_penduduk` (`id_penduduk`, `nama_penduduk`, `jk_penduduk`, `alamat_penduduk`, `nohp_penduduk`, `nik`, `tgl_input`) VALUES
(27, 'Malin Deman', 'Laki-Laki', 'Padang', '086737593754', '14116545650004', '2023-08-09 13:48:08'),
(28, 'Aziz Rusli', 'Laki-Laki', 'Padang', '081273846289', '14116545650004', '2023-08-09 13:48:08'),
(29, 'Nuri Lenggogeni', 'Perempuan', 'Padang', '08335846238', '14116545650004', '2023-08-09 13:48:08'),
(30, 'Tya Ambun Suri', 'Perempuan', 'Padang', '083443534534', '14116545650004', '2023-08-09 13:48:08'),
(31, 'Nilam Sari', 'Perempuan', 'Padang', '082347584937', '14116545650004', '2023-08-09 13:48:08'),
(32, 'Vanny Osega', 'Perempuan', 'Padang', '082314584024', '14116545650004', '2023-08-09 13:48:08'),
(33, 'Nouval Palala', 'Laki-Laki', 'Padang', '082375739583', '14116545650004', '2023-08-09 13:48:08'),
(34, 'Opy Yuristia', 'Perempuan', 'Padang', '082345679054', '14116545650004', '2023-08-09 13:48:08'),
(35, 'Rosa Candrima', 'Perempuan', 'Padang', '081285737473', '14116545650004', '2023-08-09 13:48:08'),
(36, 'Ari Fauzan', 'Laki-Laki', 'Padang', '082342356832', '14116545650004', '2023-08-09 13:48:08'),
(37, 'Siti Maisyaroh', 'Perempuan', 'Padang', '083248583848', '14116545650004', '2023-08-09 13:48:08'),
(38, 'Nana Kemala', 'Perempuan', 'Padang', '081223457483', '14116545650004', '2023-08-09 13:48:08'),
(39, 'Resty Kinanti', 'Perempuan', 'Padang', '082323434343', '14116545650004', '2023-08-09 13:48:08'),
(40, 'Akbar Koto', 'Laki-Laki', 'Padang', '082344534568', '14116545650004', '2023-08-09 13:48:08'),
(41, 'Uci Nur’aini', 'Perempuan', 'Padang', '082375748923', '14116545650004', '2023-08-09 13:48:08'),
(42, 'Pitto Mansiang', 'Laki-Laki', 'Padang', '082345748594', '14116545650004', '2023-08-09 13:48:08'),
(49, 'Putra Evans Pra', 'Laki-Laki ', 'padang panjang', '0745456456', '000000000', '2023-08-09 13:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penilaian`
--

CREATE TABLE `tbl_penilaian` (
  `nilai_id` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `ibu_hamil` varchar(20) NOT NULL,
  `anak_usia_dini` varchar(20) NOT NULL,
  `anak_sd` varchar(20) NOT NULL,
  `anak_smp` varchar(20) NOT NULL,
  `anak_sma` varchar(20) NOT NULL,
  `disabilitas_berat` varchar(20) NOT NULL,
  `lanjut_usia` varchar(20) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penilaian`
--

INSERT INTO `tbl_penilaian` (`nilai_id`, `id_penduduk`, `ibu_hamil`, `anak_usia_dini`, `anak_sd`, `anak_smp`, `anak_sma`, `disabilitas_berat`, `lanjut_usia`, `tgl_input`) VALUES
(85, 42, 'tidak ada', 'ada', 'ada', 'ada', 'tidak ada', 'ada', 'ada', '2023-06-22 15:57:59'),
(86, 41, 'ada', 'tidak ada', 'tidak ada', 'ada', 'tidak ada', 'tidak ada', 'ada', '2023-06-22 15:58:24'),
(87, 40, 'tidak ada', 'tidak ada', 'ada', 'tidak ada', 'ada', 'ada', 'tidak ada', '2023-06-22 15:58:54'),
(88, 39, 'ada', 'ada', 'tidak ada', 'ada', 'tidak ada', 'tidak ada', 'ada', '2023-06-22 15:59:19'),
(89, 38, 'tidak ada', 'ada', 'ada', 'tidak ada', 'ada', 'tidak ada', 'ada', '2023-06-22 15:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rank`
--

CREATE TABLE `tbl_rank` (
  `rank_id` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `nilai_preferensi` float NOT NULL,
  `nilai_ev` float NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rank`
--

INSERT INTO `tbl_rank` (`rank_id`, `id_penduduk`, `nilai_preferensi`, `nilai_ev`, `tgl_input`) VALUES
(406, 42, 0.971429, 6.8, '2023-07-29 09:59:28'),
(407, 41, 0.642857, 4.5, '2023-07-29 09:59:28'),
(408, 40, 0.542857, 3.8, '2023-07-29 09:59:28'),
(409, 39, 0.885714, 6.2, '2023-07-29 09:59:28'),
(410, 38, 0.785714, 5.5, '2023-07-29 09:59:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indexes for table `tbl_normalisasi`
--
ALTER TABLE `tbl_normalisasi`
  ADD PRIMARY KEY (`normalisasi_id`);

--
-- Indexes for table `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  ADD PRIMARY KEY (`id_penduduk`);

--
-- Indexes for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD PRIMARY KEY (`nilai_id`);

--
-- Indexes for table `tbl_rank`
--
ALTER TABLE `tbl_rank`
  ADD PRIMARY KEY (`rank_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_normalisasi`
--
ALTER TABLE `tbl_normalisasi`
  MODIFY `normalisasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tbl_rank`
--
ALTER TABLE `tbl_rank`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=411;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
