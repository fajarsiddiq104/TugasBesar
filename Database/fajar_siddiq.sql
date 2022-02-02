-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 09:11 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fajar_siddiq`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nm_lengkap` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nm_lengkap`) VALUES
('fajar', 'fajar', 'Fajar Siddiq');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(12) NOT NULL,
  `nm_br` varchar(30) NOT NULL,
  `gmb_br` varchar(30) NOT NULL,
  `stok` int(12) NOT NULL,
  `jml_trj` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nm_br`, `gmb_br`, `stok`, `jml_trj`) VALUES
(27, 'NASI GORENG', '61dcfdde3baf8.jpeg', 45, 23),
(28, 'MIE GORENG', '61dcfe04f419c.jpg', 31, 18),
(29, 'SATE', '61dcfe24ad10e.jpg', 38, 28),
(30, 'SATE KACANG', '61dcfe481a271.jpg', 21, 5),
(31, 'NASI KUNING', '61dcfe69c04a0.jpg', 35, 31),
(32, 'MIE REBUS', '61dcfe8d811ce.jpg', 26, 22),
(33, 'TAHU', '61dcff1471885.jfif', 32, 11),
(34, 'KETOPRAK', '61dcff4a1a151.jfif', 37, 9);

-- --------------------------------------------------------

--
-- Table structure for table `centroid`
--

CREATE TABLE `centroid` (
  `id_centroid` int(11) NOT NULL,
  `c1x` int(3) NOT NULL,
  `c1y` int(3) NOT NULL,
  `c2x` int(3) NOT NULL,
  `c2y` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `centroid`
--

INSERT INTO `centroid` (`id_centroid`, `c1x`, `c1y`, `c2x`, `c2y`) VALUES
(1, 45, 25, 80, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centroid`
--
ALTER TABLE `centroid`
  ADD PRIMARY KEY (`id_centroid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `centroid`
--
ALTER TABLE `centroid`
  MODIFY `id_centroid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
