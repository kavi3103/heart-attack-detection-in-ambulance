-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2019 at 08:42 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bouyonci`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `hospital` varchar(50) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `availablity` varchar(50) DEFAULT NULL,
  `vechile` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `hospital`, `area`, `username`, `password`, `availablity`, `vechile`, `created_at`) VALUES
(1, 'DR. CHERAN', 'MEHTA HOSPITAL', 'CHETPET', 'cheranmehta', '$2y$10$pR1kWkkBJEbU46JF6SjB3OghAqYb5kRTDSvmrhf/2gup9gRd/HhMO', 'Yes', 'TN07B7890', '2019-09-15 10:39:31'),
(2, 'MANI', 'ACS HOSPITAL', 'PORUR', 'maniacs', '$2y$10$tN8s58nC6uXPVFo171koiu3EuSNlqR7T23lYl/GwgPYg0.aQJybsW', 'Yes', 'TN05A2345', '2019-09-21 11:06:50'),
(3, 'babu', 'ACS HOSPITAL', 'PORUR', 'babuacs', '$2y$10$3ZBMjetpm2XMXTFNGCzBUe/B6v6ONEAvyDvbAn.v8glnw32g0uTou', 'No', 'TN05A2345', '2019-09-22 11:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'TN05A2345', '$2y$10$hz7uSKYCUo3Vt/eU0Nqp7OPsenljOMRa/jWqWP/tL7NuzbiH3NtZ6', '2019-09-14 21:00:01'),
(2, 'TN07B7890', '$2y$10$AlxPHMs5me0ShAv/e39eKu1hNck8NcOtLiojT5k0R8yVBGXJRf95O', '2019-09-14 21:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'nurse1', '$2y$10$f23uHElnePuk80gk.kuEJuxQS7vlxoAET/BIbTvM7T1CmLFiZRR.K', '2019-09-15 09:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `patientdetails`
--

CREATE TABLE `patientdetails` (
  `id` int(10) NOT NULL,
  `vechicleno` varchar(50) NOT NULL,
  `patientname` varchar(255) NOT NULL,
  `age` varchar(11) NOT NULL,
  `sex` varchar(11) NOT NULL,
  `cp` varchar(11) NOT NULL,
  `trestbps` varchar(11) NOT NULL,
  `chol` varchar(11) NOT NULL,
  `fbs` varchar(11) NOT NULL,
  `restecg` varchar(11) NOT NULL,
  `thalach` varchar(11) NOT NULL,
  `exang` varchar(11) NOT NULL,
  `oldpeak` varchar(11) NOT NULL,
  `slope` varchar(11) NOT NULL,
  `ca` varchar(11) NOT NULL,
  `thal` varchar(11) NOT NULL,
  `predict` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientdetails`
--

INSERT INTO `patientdetails` (`id`, `vechicleno`, `patientname`, `age`, `sex`, `cp`, `trestbps`, `chol`, `fbs`, `restecg`, `thalach`, `exang`, `oldpeak`, `slope`, `ca`, `thal`, `predict`) VALUES
(24, 'TN05A2345', 'xxx', '52', '1', '2', '172', '199', '1', '1', '162', '0', '1', '2', '0', '3', 'YES\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `patientdetails`
--
ALTER TABLE `patientdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patientdetails`
--
ALTER TABLE `patientdetails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
