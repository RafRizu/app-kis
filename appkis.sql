-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 11:49 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appkis`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `datakis`
-- (See below for the actual view)
--
CREATE TABLE `datakis` (
`no_kis` int(20)
,`nik` varchar(20)
,`nama` varchar(50)
,`alamat` text
,`nama_faskes` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `faskes`
--

CREATE TABLE `faskes` (
  `id_faskes` int(20) NOT NULL,
  `nama_faskes` varchar(50) NOT NULL,
  `tingkat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faskes`
--

INSERT INTO `faskes` (`id_faskes`, `nama_faskes`, `tingkat`) VALUES
(1, 'WERU', 1),
(2, 'KEDAWUNG', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kis`
--

CREATE TABLE `kis` (
  `no_kis` int(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `id_faskes` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kis`
--

INSERT INTO `kis` (`no_kis`, `nik`, `id_faskes`) VALUES
(20230001, '13232142', 2);

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`nik`, `nama`, `alamat`, `tgl_lahir`) VALUES
('13232142', 'Rafi', 'Weru', '2023-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
('01', 'RafRizu', '12345');

-- --------------------------------------------------------

--
-- Structure for view `datakis`
--
DROP TABLE IF EXISTS `datakis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `datakis`  AS SELECT `kis`.`no_kis` AS `no_kis`, `peserta`.`nik` AS `nik`, `peserta`.`nama` AS `nama`, `peserta`.`alamat` AS `alamat`, `faskes`.`nama_faskes` AS `nama_faskes` FROM ((`kis` join `peserta` on(`peserta`.`nik` = `kis`.`nik`)) join `faskes` on(`faskes`.`id_faskes` = `kis`.`id_faskes`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faskes`
--
ALTER TABLE `faskes`
  ADD PRIMARY KEY (`id_faskes`);

--
-- Indexes for table `kis`
--
ALTER TABLE `kis`
  ADD PRIMARY KEY (`no_kis`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_faskes` (`id_faskes`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faskes`
--
ALTER TABLE `faskes`
  MODIFY `id_faskes` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kis`
--
ALTER TABLE `kis`
  ADD CONSTRAINT `kis_ibfk_1` FOREIGN KEY (`id_faskes`) REFERENCES `faskes` (`id_faskes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kis_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `peserta` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
