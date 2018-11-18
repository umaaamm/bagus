-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2018 at 02:06 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bagus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_acc`
--

CREATE TABLE `tbl_acc` (
  `id_acc` int(11) NOT NULL,
  `nama_acc` varchar(100) NOT NULL,
  `harga_acc` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_acc`
--

INSERT INTO `tbl_acc` (`id_acc`, `nama_acc`, `harga_acc`, `jenis`) VALUES
(1, '== Nama Barang ==', '0', '-'),
(2, 'bodi', '20000', 'supra x 124');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `level`) VALUES
(2, 'mam', 'mam', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id_booking` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_acc` int(11) NOT NULL,
  `id_mekanik` int(11) NOT NULL,
  `jam_booking` time NOT NULL,
  `tgl_booking` varchar(100) NOT NULL,
  `s_service` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `estimasi_selesai` varchar(100) NOT NULL,
  `jam_bayar_dp` varchar(100) NOT NULL,
  `status_bayar` int(11) NOT NULL,
  `jumlah_dp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id_booking`, `id_member`, `id_service`, `id_acc`, `id_mekanik`, `jam_booking`, `tgl_booking`, `s_service`, `total`, `estimasi_selesai`, `jam_bayar_dp`, `status_bayar`, `jumlah_dp`) VALUES
(9, 2, 3, 2, 2, '04:45:00', '2018-11-15 16:42:04', '2', '1020000', '05:15 PM', '2018-11-15 17:20:43', 1, '100000'),
(10, 2, 4, 2, 2, '02:15:00', '2018-11-18 12:47:10', '2', '1520000', '04:15 PM', '2018-11-18 13:47:10', 1, '10000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `id_chat` int(11) NOT NULL,
  `text` text NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`id_chat`, `text`, `nama`, `status`) VALUES
(7, '[admin] kwokokw', 'mam', 1),
(8, 'hqlooo', 'mam', 1),
(9, '[Admin] : kokowkokokw', 'mam', 1),
(10, 'fdfdf', 'Kurniawan Gigih Lutfi Umam', 1),
(11, 'fsdfsafsagfasgasgd', 'Kurniawan Gigih Lutfi Umam', 1),
(12, '[Admin] : afafadf', 'mam', 1),
(13, 'kwokwowk coba coba', 'Kurniawan Gigih Lutfi Umam', 1),
(14, 'fafdfdfsdfsd', 'Kurniawan Gigih Lutfi Umam', 1),
(15, 'dfafsdfasfsfdsfdsaaaaaaaaaa', 'Kurniawan Gigih Lutfi Umam', 1),
(16, 'afadsaadadaddwqdqdwqdq', 'Kurniawan Gigih Lutfi Umam', 1),
(17, 'uammamamamamama', 'Kurniawan Gigih Lutfi Umam', 1),
(18, 'fsdfsgsggsfgfdgfdggasaaaaaaaaaaaaa', 'Kurniawan Gigih Lutfi Umam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mekanik`
--

CREATE TABLE `tbl_mekanik` (
  `id_mekanik` int(11) NOT NULL,
  `nama_mekanik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mekanik`
--

INSERT INTO `tbl_mekanik` (`id_mekanik`, `nama_mekanik`) VALUES
(1, 'Belum ada Mekanik'),
(2, 'Bagus'),
(3, 'Surti');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `merk_motor` varchar(100) NOT NULL,
  `type_motor` varchar(100) NOT NULL,
  `plat_motor` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id_member`, `nama`, `no_hp`, `merk_motor`, `type_motor`, `plat_motor`, `username`, `password`, `email`, `level`, `alamat`) VALUES
(2, 'Kurniawan Gigih Lutfi Umam', '0988766777', 'Honda', 'beat pop', 'be 8788 HI', 'mam', 'ds', 'umam.tekno@gmail.com', 'Member', 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng'),
(3, '', '', '', '', '', '', '', '', 'Member', ''),
(4, 'Kurniawan Gigih Lutfi Umam', '085758547924', 'Honda', 'beat pop', 'be 8788 HI', 'mam', 'fd', 'umam.tekno@gmail.com', 'Member', 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng\r\nBandar Jaya'),
(5, 'fad', 'faf', 'fda', 'fadf', 'adfa', 'faf', 'fadf', 'adfa', 'Member', 'af');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `id_rating` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`id_rating`, `id_member`, `rating`) VALUES
(4, 2, 3),
(5, 2, 5),
(6, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id_service` int(11) NOT NULL,
  `paket_service` varchar(100) NOT NULL,
  `harga_service` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id_service`, `paket_service`, `harga_service`) VALUES
(2, '== Paket Service ==', '0'),
(3, 'ganti oli + service ringan (honda)', '1000000'),
(4, 'ganti oli + service ringan (yamaha)', '1500000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_acc`
--
ALTER TABLE `tbl_acc`
  ADD PRIMARY KEY (`id_acc`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `tbl_mekanik`
--
ALTER TABLE `tbl_mekanik`
  ADD PRIMARY KEY (`id_mekanik`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id_service`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_acc`
--
ALTER TABLE `tbl_acc`
  MODIFY `id_acc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_mekanik`
--
ALTER TABLE `tbl_mekanik`
  MODIFY `id_mekanik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
