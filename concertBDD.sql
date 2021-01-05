-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2021 at 11:30 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `concert`
--

-- --------------------------------------------------------

--
-- Table structure for table `concert`
--

CREATE TABLE `concert` (
  `id` int(11) NOT NULL,
  `band_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `concert`
--

INSERT INTO `concert` (`id`, `band_id`, `hall_id`, `date`) VALUES
(1, 1, 1, '2021-01-28'),
(2, 1, 2, '2020-12-15'),
(4, 1, 2, '2021-04-09'),
(5, 1, 2, '2020-12-14'),
(6, 1, 2, '2021-08-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concert`
--
ALTER TABLE `concert`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D57C02D249ABEB17` (`band_id`),
  ADD KEY `IDX_D57C02D252AFCFD6` (`hall_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concert`
--
ALTER TABLE `concert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `concert`
--
ALTER TABLE `concert`
  ADD CONSTRAINT `FK_320ED90149ABEB17` FOREIGN KEY (`band_id`) REFERENCES `band` (`id`),
  ADD CONSTRAINT `FK_320ED90152AFCFD6` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
