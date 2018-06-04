-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2018 at 08:14 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema`
--
CREATE DATABASE IF NOT EXISTS `sistema` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sistema`;

-- --------------------------------------------------------

--
-- Table structure for table `pavadzimes`
--

DROP TABLE IF EXISTS `pavadzimes`;
CREATE TABLE `pavadzimes` (
  `id` int(11) NOT NULL,
  `rekina_nr` varchar(255) NOT NULL,
  `rekinu_izrakstija` varchar(255) NOT NULL,
  `izsutisanas_datums` date NOT NULL,
  `apmaksas_datums` date NOT NULL,
  `kam_izrakstija` varchar(255) NOT NULL,
  `cena_bez_pvn` decimal(15,2) NOT NULL,
  `pvn` decimal(15,2) NOT NULL,
  `cena_kopa` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pavadzimes`
--

INSERT INTO `pavadzimes` (`id`, `rekina_nr`, `rekinu_izrakstija`, `izsutisanas_datums`, `apmaksas_datums`, `kam_izrakstija`, `cena_bez_pvn`, `pvn`, `cena_kopa`) VALUES
(13, 'ND12344447', 'naked Core, SIA', '2018-06-07', '2018-06-14', 'dsad', '17.00', '3.57', '19.57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$dpEvi680Hxv5KJW304MCguQq44FTPvTMpkR660KI5OS.j1pIDLU0y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pavadzimes`
--
ALTER TABLE `pavadzimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pavadzimes`
--
ALTER TABLE `pavadzimes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
