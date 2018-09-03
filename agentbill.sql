-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2018 at 11:01 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdprotidin`
--

-- --------------------------------------------------------

--
-- Table structure for table `agentbill`
--

CREATE TABLE `agentbill` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `unitprice` double(11,3) NOT NULL,
  `quantity` int(11) NOT NULL,
  `samplecopy` decimal(11,0) NOT NULL,
  `totalbill` double(11,3) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `i` int(11) NOT NULL,
  `month` varchar(100) NOT NULL,
  `exsamplecopy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agentbill`
--
ALTER TABLE `agentbill`
  ADD KEY `i` (`i`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agentbill`
--
ALTER TABLE `agentbill`
  MODIFY `i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
