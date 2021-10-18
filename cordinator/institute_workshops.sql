-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2021 at 09:03 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `institute_workshops`
--

-- --------------------------------------------------------

--
-- Table structure for table `workshop_coordinator`
--

CREATE TABLE `workshop_coordinator` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workshop_coordinator`
--

INSERT INTO `workshop_coordinator` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '$2y$10$b2rqTqeGw4om7PJAjLAci.u9z11Laaj0pksYH9dJ/kYyOlW727n22');

-- --------------------------------------------------------

--
-- Table structure for table `workshop_details`
--

CREATE TABLE `workshop_details` (
  `w_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(10) NOT NULL,
  `participants` varchar(10) NOT NULL,
  `expected_no` varchar(30) NOT NULL,
  `discipline` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workshop_details`
--

INSERT INTO `workshop_details` (`w_id`, `date`, `type`, `participants`, `expected_no`, `discipline`) VALUES
(1, '2021-10-20', 'Outreach', 'Faculties', '67 | Mini-workshop', 'Aeronautical'),
(2, '2021-10-22', 'In-house', 'Students', '102 | workshop', 'Civil'),
(8, '2021-10-22', 'In-house', 'Students', '102 | workshop', 'Civil'),
(9, '2021-10-28', 'In-house', 'Students', '77 | Mini-workshop', 'Civil,Electronic,Mechanical'),
(10, '2021-10-28', 'In-house', 'Students', '77 | Mini-workshop', 'Civil,Electronic,Mechanical'),
(11, '2021-10-18', 'In-house', 'Students', '991 | workshop', 'Computer,Chemical');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `workshop_coordinator`
--
ALTER TABLE `workshop_coordinator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshop_details`
--
ALTER TABLE `workshop_details`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `workshop_coordinator`
--
ALTER TABLE `workshop_coordinator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workshop_details`
--
ALTER TABLE `workshop_details`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
