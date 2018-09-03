-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2018 at 01:15 PM
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
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `salery` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `econtact` varchar(100) NOT NULL,
  `blood` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `bill` varchar(100) NOT NULL,
  `saleryStatus` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `phone2` varchar(100) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`email`, `password`, `firstname`, `lastname`, `address`, `phone`, `designation`, `date`, `picture`, `status`, `salery`, `facebook`, `econtact`, `blood`, `month`, `bill`, `saleryStatus`, `color`, `phone2`, `id`) VALUES
('deb@gmail.com', '123', '', '', '', '', '', '', '', 'admin', '', '', '', '', '', '', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`email`),
  ADD KEY `email` (`email`),
  ADD KEY `email_2` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
