-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2024 at 06:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `telepon` bigint(10) NOT NULL,
  `kondisi` enum('selesai','berlangsung','mendantang') NOT NULL,
  `gambar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`id`, `nama`, `tempat`, `telepon`, `kondisi`, `gambar`) VALUES
(1, 'pencinta alam', 'zoom meeting', 81534297860, 'mendantang', '6678152bc00b6.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `kerajinan`
--

CREATE TABLE `kerajinan` (
  `id` int(11) NOT NULL,
  `bentukKerajinan` varchar(50) NOT NULL,
  `bahan` varchar(50) NOT NULL,
  `harga` bigint(10) NOT NULL,
  `foto` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kerajinan`
--

INSERT INTO `kerajinan` (`id`, `bentukKerajinan`, `bahan`, `harga`, `foto`) VALUES
(3, 'lampu', 'sendok plastik', 15000, '6678096139379.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `komunitas`
--

CREATE TABLE `komunitas` (
  `no` int(11) NOT NULL,
  `namaKomunitas` text NOT NULL,
  `kontak` bigint(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `komunitas`
--

INSERT INTO `komunitas` (`no`, `namaKomunitas`, `kontak`, `alamat`) VALUES
(1, 'alam sejuk', 81423756089, 'jl. mawar');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `gender` enum('m','f','o') NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tabungan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `Name`, `email`, `password`, `tabungan`) VALUES
(3, 'febrian', 'm.raffa.febrian@gmail.com', 'mraffa0217', 25000),
(4, 'Warman', 'putuaditya@gmail.com', '123', 0),
(7, 'raffa', 'raffa@gmail.com', '456', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kerajinan`
--
ALTER TABLE `kerajinan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komunitas`
--
ALTER TABLE `komunitas`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kerajinan`
--
ALTER TABLE `kerajinan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komunitas`
--
ALTER TABLE `komunitas`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
