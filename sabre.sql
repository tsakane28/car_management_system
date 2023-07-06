-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 03:41 PM
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
-- Database: `sabre`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `event_leader_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `physical_address` text NOT NULL,
  `vat` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `event_type` varchar(50) NOT NULL,
  `event_duration` varchar(50) NOT NULL,
  `event_date` date NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `num_delegates` int(11) NOT NULL,
  `event_start_time` time NOT NULL,
  `event_end_time` time NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `cateringpack` varchar(50) NOT NULL,
  `break_time` varchar(50) NOT NULL,
  `special_dietary_reqs` text DEFAULT NULL,
  `bar_reqs` text DEFAULT NULL,
  `approval` tinyint(1) NOT NULL DEFAULT 0,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `company_name`, `event_leader_name`, `phone`, `physical_address`, `vat`, `email`, `event_type`, `event_duration`, `event_date`, `event_name`, `num_delegates`, `event_start_time`, `event_end_time`, `room_name`, `cateringpack`, `break_time`, `special_dietary_reqs`, `bar_reqs`, `approval`, `Date`) VALUES
(25, 'Zol', 'Milton', '0773638686', '120 Amandas Acecia Road, Concession', '1', 'marshall@gmail.com', 'training', 'evening', '2023-06-28', 'meeting', 5, '07:29:00', '10:29:00', 'explorers', 'silver', 'Mid Morning', 'Coffee', 'non', 1, NULL),
(26, 'Zol', 'milton', '0773638686', '120 Amandas Acecia Road, Concession', '1', 'marshall@gmail.com', 'workshop', 'evening', '2023-06-30', 'meeting', 1, '02:59:00', '03:59:00', 'inventors', 'gold', 'Arrival', 'coffee', 'non', 0, NULL),
(27, 'Zol', 'milton', '0773638686', '120 Amandas Acecia Road, Concession', '1', 'marshall@gmail.com', 'workshop', 'evening', '2023-06-30', 'meeting', 1, '04:59:00', '08:59:00', 'inventors', 'gold', 'Arrival', 'coffee', 'non', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
