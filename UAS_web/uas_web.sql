-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 10:59 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_kapal`
--

CREATE TABLE `akun_kapal` (
  `ID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun_kapal`
--

INSERT INTO `akun_kapal` (`ID`, `username`, `email`, `Password`, `Role`) VALUES
(1, 'ADMIN', 'admin@gmail.com', '$2y$10$qRe829Fw6YgHXT1jNkvoo.EZwHfaKPAOqHp00bWUpF9NDgSel7eeS', 'ADMIN'),
(2, 'user', 'user@gmail.com', '$2y$10$62/DThGoP8AzhOn9etuckOujxoqaDwTd1ZA32/8sN25lbSRWmkYWa', 'member'),
(3, 'Bapak', 'bapak@gmail.com', '$2y$10$G2/J1pSfVQ3LQ3bYxARvU.iBDgsDyrY4m14Vcj.39uNSZwNWOgaeW', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `ID_User` int(11) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Umur` int(30) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `No_Hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`ID_User`, `Nama`, `Umur`, `Alamat`, `No_Hp`) VALUES
(2, 'User', 18, 'Jl. Paser', '081543744554'),
(3, 'Bapak', 76, 'Disini', '08122121212');

-- --------------------------------------------------------

--
-- Table structure for table `kapal`
--

CREATE TABLE `kapal` (
  `ID_Kapal` int(11) NOT NULL,
  `Nama_Kapal` varchar(30) NOT NULL,
  `Pelabuhan` varchar(30) NOT NULL,
  `Tujuan` varchar(30) NOT NULL,
  `Harga` int(12) NOT NULL,
  `Foto_kapal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kapal`
--

INSERT INTO `kapal` (`ID_Kapal`, `Nama_Kapal`, `Pelabuhan`, `Tujuan`, `Harga`, `Foto_kapal`) VALUES
(1, 'Kapal Pesiar', 'Balikpapan', 'Penajam', 100000, 'Kapal Pesiar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_Transaksi` int(30) NOT NULL,
  `ID_User` int(30) NOT NULL,
  `ID_kapal` int(30) NOT NULL,
  `Biaya` int(15) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `Waktu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`ID_Transaksi`, `ID_User`, `ID_kapal`, `Biaya`, `Status`, `Waktu`) VALUES
(1, 3, 1, 100000, 'Lunas', 'Saturday 03-12-22 - 17:55:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_kapal`
--
ALTER TABLE `akun_kapal`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`ID_User`);

--
-- Indexes for table `kapal`
--
ALTER TABLE `kapal`
  ADD PRIMARY KEY (`ID_Kapal`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_Transaksi`),
  ADD UNIQUE KEY `ID_User` (`ID_User`,`ID_kapal`),
  ADD KEY `ID_kapal` (`ID_kapal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun_kapal`
--
ALTER TABLE `akun_kapal`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kapal`
--
ALTER TABLE `kapal`
  MODIFY `ID_Kapal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `ID_Transaksi` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biodata`
--
ALTER TABLE `biodata`
  ADD CONSTRAINT `biodata_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `akun_kapal` (`ID`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `akun_kapal` (`ID`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`ID_kapal`) REFERENCES `kapal` (`ID_Kapal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
