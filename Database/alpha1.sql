-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 22, 2019 at 02:25 PM
-- Server version: 10.1.37-MariaDB-0+deb9u1
-- PHP Version: 7.0.33-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alpha1`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(6) NOT NULL,
  `NIS` varchar(10) NOT NULL,
  `tgl_hadir` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `NIS`, `tgl_hadir`) VALUES
(6, '221141', '17-01-2019'),
(7, '221141', '18-01-2019'),
(8, '221141', '21-01-2019'),
(9, '231212', '18-01-2019'),
(10, '231212', '21-01-2019'),
(11, '291145', '21-01-2019');

-- --------------------------------------------------------

--
-- Table structure for table `beyeng`
--

CREATE TABLE `beyeng` (
  `Servant` varchar(50) NOT NULL,
  `Class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `beyeng`
--

INSERT INTO `beyeng` (`Servant`, `Class`) VALUES
('Mash Kyrielight', 'Shielder'),
('Artoria Pendragon', 'Saber'),
('Siegfried', 'Saber'),
('Nero Claudius', 'Saber');

-- --------------------------------------------------------

--
-- Table structure for table `Data_Siswa`
--

CREATE TABLE `Data_Siswa` (
  `nomer_id` int(5) NOT NULL,
  `NIS` int(10) NOT NULL,
  `rfid` varchar(12) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Kelas` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `No Telpon Orang Tua` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Data_Siswa`
--

INSERT INTO `Data_Siswa` (`nomer_id`, `NIS`, `rfid`, `Nama`, `Kelas`, `alamat`, `No Telpon Orang Tua`) VALUES
(1, 291145, 'E1648411', 'icad', '10A', '', 0),
(2, 221141, '', 'Bimo Ichmu AM', '10X', '', 21021021),
(3, 231212, '', 'Bang Sat Rio', '10J', '', 88718311);

-- --------------------------------------------------------

--
-- Table structure for table `Kehadiran`
--

CREATE TABLE `Kehadiran` (
  `NIS` int(10) NOT NULL,
  `Senin` int(2) NOT NULL,
  `Selasa` int(2) NOT NULL,
  `Rabu` int(2) NOT NULL,
  `Kamis` int(2) NOT NULL,
  `Jumat` int(2) NOT NULL,
  `Total` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Kehadiran`
--

INSERT INTO `Kehadiran` (`NIS`, `Senin`, `Selasa`, `Rabu`, `Kamis`, `Jumat`, `Total`) VALUES
(291145, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Data_Siswa`
--
ALTER TABLE `Data_Siswa`
  ADD PRIMARY KEY (`nomer_id`);

--
-- Indexes for table `Kehadiran`
--
ALTER TABLE `Kehadiran`
  ADD PRIMARY KEY (`NIS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `Data_Siswa`
--
ALTER TABLE `Data_Siswa`
  MODIFY `nomer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
