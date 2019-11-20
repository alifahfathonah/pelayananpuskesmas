-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2018 at 06:39 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siap`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `ID` int(11) NOT NULL,
  `TANGGAL` date NOT NULL,
  `JAM` time NOT NULL,
  `NOMOR` int(4) NOT NULL,
  `PASIENNM` varchar(100) DEFAULT NULL,
  `TUJUANNO` int(2) NOT NULL,
  `TUJUANNM` varchar(60) NOT NULL,
  `STATUS` int(2) NOT NULL COMMENT '0 : Deleted 1 : antri 11 : panggil 2 : ambil Obat'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`ID`, `TANGGAL`, `JAM`, `NOMOR`, `PASIENNM`, `TUJUANNO`, `TUJUANNM`, `STATUS`) VALUES
(1, '2018-05-06', '11:40:25', 1, NULL, 1, 'REGISTRATION', 1),
(2, '2018-05-06', '11:40:27', 2, NULL, 1, 'REGISTRATION', 1),
(3, '2018-05-06', '11:40:29', 3, NULL, 1, 'REGISTRATION', 1),
(4, '2018-05-07', '20:56:09', 1, '', 11, 'APOTIK', 31),
(5, '2018-05-07', '20:56:11', 2, '', 14, 'KUSTA', 1),
(6, '2018-05-07', '20:56:12', 3, 'KOMAR', 13, 'POLI TB PARU', 11),
(7, '2018-05-07', '20:56:15', 4, 'DODOK', 11, 'APOTIK', 1),
(8, '2018-05-12', '11:42:12', 1, 'KOMAR', 11, 'APOTIK', 31),
(9, '2018-05-12', '11:42:13', 2, 'DEDE', 11, 'APOTIK', 31),
(10, '2018-05-12', '11:42:16', 3, NULL, 1, 'REGISTRATION', 0),
(11, '2018-05-14', '11:59:51', 100, NULL, 1, 'REGISTRATION', 11),
(12, '2018-05-14', '11:59:54', 2, NULL, 1, 'REGISTRATION', 1);

-- --------------------------------------------------------

--
-- Table structure for table `masterdata`
--

CREATE TABLE `masterdata` (
  `ID_R` int(11) NOT NULL,
  `RUANG` varchar(50) NOT NULL,
  `STATUS` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masterdata`
--

INSERT INTO `masterdata` (`ID_R`, `RUANG`, `STATUS`) VALUES
(1, 'REGISTRATION', 4),
(3, 'LANSIA', 1),
(4, 'UMUM', 1),
(5, 'GIGI', 1),
(6, 'MTBS', 1),
(9, 'KIA', 1),
(11, 'APOTIK', 2),
(12, 'LABORATURIUM', 2),
(13, 'TB PARU', 1),
(14, 'KUSTA', 1),
(15, 'RAWAT INAP', 2),
(16, 'UGD', 2),
(17, 'RUANG BERSALIN', 2),
(18, 'RUJUK', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `masterdata`
--
ALTER TABLE `masterdata`
  ADD PRIMARY KEY (`ID_R`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `masterdata`
--
ALTER TABLE `masterdata`
  MODIFY `ID_R` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
