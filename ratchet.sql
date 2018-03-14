-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 14, 2018 at 10:12 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ratchet`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsheet`
--

CREATE TABLE `tblsheet` (
  `id` int(11) NOT NULL,
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `text` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsheet`
--

INSERT INTO `tblsheet` (`id`, `x`, `y`, `text`) VALUES
(1, 0, 0, '1'),
(2, 1, 0, '2'),
(3, 2, 0, '4'),
(4, 3, 0, '5'),
(5, 4, 0, '6'),
(6, 5, 0, '66'),
(7, 6, 0, '6'),
(8, 7, 0, '6'),
(9, 0, 1, '5'),
(10, 1, 1, '5'),
(11, 2, 1, '5'),
(12, 3, 1, '5'),
(13, 4, 1, '5'),
(14, 5, 1, '5'),
(15, 6, 1, '5'),
(16, 7, 1, '5'),
(17, 8, 1, '5'),
(18, 9, 1, '5'),
(19, 0, 2, '5'),
(20, 1, 2, '5'),
(21, 2, 2, '5'),
(22, 3, 2, '5'),
(23, 1, 6, 'ff'),
(24, 1, 7, 'ff'),
(25, 4, 3, '45'),
(26, 5, 3, '33'),
(27, 6, 3, 'rr'),
(28, 5, 4, 'rr'),
(29, 7, 3, 'a'),
(30, 0, 3, 'san'),
(31, 1, 3, 'deep'),
(32, 2, 3, 'is typing'),
(33, 3, 4, 'mundi'),
(34, 1, 9, 'jj'),
(35, 2, 9, 'kk'),
(36, 3, 9, 'jj'),
(37, 4, 9, 'nn'),
(38, 4, 10, 'mm'),
(39, 5, 10, 'nn'),
(40, 6, 10, 'mm'),
(41, 7, 10, ',,'),
(42, 2, 7, 'rajesh'),
(43, 6, 7, 'sandeep'),
(44, 5, 5, 'sds'),
(45, 6, 5, 'sdds'),
(46, 0, 8, 'faris'),
(47, 1, 8, 'is '),
(48, 2, 8, 'here');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsheet`
--
ALTER TABLE `tblsheet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblsheet`
--
ALTER TABLE `tblsheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
